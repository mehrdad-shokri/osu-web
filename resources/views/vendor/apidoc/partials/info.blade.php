{{--
    Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
    See the LICENCE file in the repository root for full licence text.
--}}
# Introduction

Welcome to the documentation for osu!api v2. You can use this API to get information on various circles and those who click them.

<aside class="warning">
WARNING: The API in under heavy development and has not stabilised yet. If you choose to use it at this stage, you do so at your own risk. Endpoints may appear, disappear, be renamed and completely change behaviour without warning.
</aside>

Note that while we endeavour to keep this documentation up to date, consider it a work-in-progress and note that it will likely contains errors.

If you notice any errors in the documentation or encounter problems using the API, please check for (or create if necessary) [issues on GitHub](https://github.com/ppy/osu-web/issues). Alternatively, you can ask in `#osu-web` [on the development discord](https://discord.gg/ppy).

Code examples are provided in the dark area to the right, you can use the tabs at the top of the page to switch between bash and javascript samples.

@if($showPostmanCollectionButton)
If you use [Postman](https://getpostman.com), you can [download a collection here](collection.json).
@endif

# Terms of Use

Use the API for good. Don't overdo it. If in doubt, ask before (ab)using :). _this section may expand as necessary_.

Current rate limit is set at an insanely high 1200 requests per minute, with burst capability of up to 200 beyond that. If you require more, you probably fall into the above category of abuse. If you are doing more than 60 requests a minute, you should probably give [peppy](mailto:pe@ppy.sh) a yell.

# Endpoint

## Base URL

The base URL is: `{{ trim(config('app.url'), '/') }}/api/[version]/`

## API Versions

This is combined with the base endpoint to determine where requests should be sent.

Version | Status
------- | ---------------------------------------------------------------
v2      | current _(not yet public, consider unstable and expect breaking changes)_
v1      | _legacy api provided by the old site, will be deprecated soon_

# Authentication

osu!api uses OAuth2 to grant access to the API. More information about applications you have registered and granted permissions to can be found [here](#managing-oauth-applications).

The API supports the following grant types:
- [Authorization Code Grant](https://oauth.net/2/grant-types/authorization-code/)
- [Client Credentials Grant](https://oauth.net/2/grant-types/client-credentials/)

Before you can use the osu!api, you will need to
1. have registered an OAuth Application.
2. acquire an access token by either:
  - authorizing users for your application;
  - requesting Client Credentials token.


## Registering an OAuth application

Before you can get an OAuth token, you will need to register an OAuth application on your [account settings page]({{ route('account.edit').'#new-oauth-application' }})

To register an OAuth application you will need to provide the:

Name                     | Description
-------------------------|--------------------------
Application Name         | This is the name that will be visible to users of your application. The name of your application cannot be changed.
Application Callback URL | The URL in your application where users will be sent after authorization.

The `Application Callback URL` is required when for using [Authorization Codes](#authorization-code-grant).
This may be left blank if you are only using [Client Credentials Grants](#client-credentials-grant).

Your new OAuth application will have a `Client ID` and `Client Secret`; the `Client Secret` is like a password for your OAuth application, it should be kept private and **do not share it with anyone else**.


## Authorization Code Grant

The flow to authorize users for your application is:
1. Requesting authorization from users
2. Users are redirected back to your site
3. Your application accesses the API with the user's access token


### Request authorization from a user

To obtain an access token, you must first get an authorization code that is created when a user grants permissions to your application. To request permission from the user, they should to redirected to:

`GET {{ route('oauth.authorizations.authorize') }}`

Parameters

Name          | Type   | Description
--------------|--------|-------------------------------------------------------
client_id     | number | The Client ID you received when you [registered]({{ route('account.edit').'#new-oauth-application' }})
redirect_uri  | string | The URL in your application where users will be sent after authorization. This must match the registered Application Callback URL exactly.
response_type | string | This should always be `code` when requesting authorization.
scope         | string | A space-delimited string of [scopes](#scopes).
state         | string | Data that will be returned when a temporary code is issued. It can be used to provide a token for protecting against cross-site request forgery attacks.


### User is redirected back to your site

If the user accepts your request, they will be redirect back to your site with a temporary single-use `code` contained in the URL paramater.
If a `state` value was provided in the previous request, it will be returned here.

<aside class="notice">
If you are using `state` as protection against CSRF attacks, your OAuth client is responsible for validating this value.
</aside>

Exchange this `code` for an access token:

```javascript
fetch("{!! route('oauth.passport.token') !!}", {
    method: 'post',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        "grant_type": "authorization_code",
        "client_id": 1,
        "client_secret": "secret",
        "redirect_uri": "https://notarealaddress.local/oauth/osu",
        "code": "code"
    })
})
.then(response => {
    return response.json();
});
```

`POST {!! route('oauth.passport.token') !!}`

Parameters

Name          | Type   | Description
--------------|--------|-------------------------------
client_id     | number | The client ID of your application.
client_secret | string | The client secret of your application.
code          | string | The code you received.
grant_type    | string | This must always be `authorization_code`
redirect_uri  | string | The URL in your application where users will be sent after authorization.


```json
{
    "token_type": "Bearer",
    "expires_in": 86400,
    "access_token": "verylongstring",
    "refresh_token": "anotherlongstring",
}
```

Successful requests will be issued an access token:

Name          | Type   | Description
--------------|--------|-----------------------------
token_type    | string | The type of token, this should always be `Bearer`.
expires_in    | number | The number of seconds the token will be valid for.
access_token  | string | The access token.
refresh_token | string | The refresh token.


## Client Credentials Grant

The client credential flow provides a way for developers to get access tokens that do not have associated user permissions; as such, these tokens are considered as guest users.

Example for requesting Client Credentials token:

```javascript
fetch("{!! route('oauth.passport.token') !!}", {
    method: 'post',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        "grant_type": "client_credentials",
        "client_id": 1,
        "client_secret": "secret",
        "scope": "public"
    })
})
.then(response => {
    return response.json();
});
```

`POST {!! route('oauth.passport.token') !!}`

Parameters

Name          | Type   | Description
--------------|--------|-------------------------------
client_id     | number | The Client ID you received when you [registered]({{ route('account.edit').'#new-oauth-application' }})
client_secret | string | The client secret of your application.
grant_type    | string | This must always be `client_credentials`
scope         | string | Must be `public`; other scopes have no meaningful effect.


```json
{
    "token_type": "Bearer",
    "expires_in": 86400,
    "access_token": "verylongstring",
}
```

Successful requests will be issued an access token:

Name          | Type   | Description
--------------|--------|-----------------------------
token_type    | string | The type of token, this should always be `Bearer`.
expires_in    | number | The number of seconds the token will be valid for.
access_token  | string | The access token.


## Using the access token to access the API

With the access token, you can make requests to osu!api on behalf of a user.

The token should in included in the header of requests to the API.

`Authorization: Bearer @{{token}}`

```shell
# With shell, you can just pass the correct header with each request
curl "{{ trim(config('app.url'), '/') }}/api/[version]/[endpoint]"
  -H "Authorization: Bearer @{{token}}"
```

```javascript
// This javascript example uses fetch()
fetch("{{ trim(config('app.url'), '/') }}/api/[version]/[endpoint]", {
    headers: {
      Authorization: 'Bearer @{{token}}'
    }
});
```

> Make sure to replace `@{{token}}` with your OAuth2 token.

<aside class="notice">
You must replace <code>@{{token}}</code> with your OAuth2 token.
</aside>


## Scopes

The following scopes are currently supported:

Name          | Description
--------------|-------------------------------
identify      | Allows reading of the public profile of the authorizing user (`/me`).
friends.read  | Allows reading of the authorizing user's friend list.
public        | Allows reading of publicly available data on behalf of the authorizing user.

`identify` is the default scope for the [Authorization Code Grant](#authorization-code-grant) and always implicitly provided. The [Client Credentials Grant](#client-credentials-grant) does not currently have any default scopes.


## Managing OAuth applications

Your [account settings]({{ route('account.edit').'#oauth' }}) page will show your registered OAuth applications, and all the OAuth applications you have granted permissions to.

### Reset Client Secret

You can generate a new `Client Secret` by choosing to "Reset client secret", however, this will disable all access tokens issued for the application.


# Changelog

For a full list of changes, see the
[Changelog on the site]({{ route('changelog.show', ['changelog' => 'web']) }}).

## Breaking Changes

### 2020-05-01
- `users.read` scope removed, replace with more general `public` scope.

### 2020-02-18
- Beatmap `max_combo` and build update stream `user_count` now return the values as primitives instead of numbers wrapped in an array.

### 2019-10-09
- Ranking API response no longer returns an array at the top level; an object with keys is now returned.

### 2019-07-18
- [`User`](#user) now returns counts directly as primitives instead of numbers wrapped in an array.
