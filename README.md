<p align="center">
	<img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400">
</p>
<p align="center">
    <img src="https://www.frenchtechbordeaux.com/wp-content/uploads/2019/02/logo_ynov_campus_rvb.png" height="70">
    <img src="https://imgur.com/uzHSqWC.png" height="70">
</p>

# Laravel - Ynov/JWT
A simple application that feature 
- The [Microsoft Graph's API](https://docs.microsoft.com/fr-fr/graph/overview)
  using [Socialite Providers](https://socialiteproviders.netlify.com/)
  to allow users register/login using their [Ynov](https://www.ynov.com/) Mail address.
- An API base that is using [JWT Auth](https://github.com/tymondesigns/jwt-auth). 

## 🔧 Setup guide

Copy the ``.env.example`` file to ``.env``

Install dependencies:
> composer install

Generate the application secret key:

> php artisan key:generate

Generate jwt secret key:

> php artisan jwt:secret

Setup you're database as you want in you're **.env** file and then run:

> php artisan migrate:fresh

Then go to you're
[Microsoft Azure Application](https://portal.azure.com/#blade/Microsoft_AAD_IAM/ActiveDirectoryMenuBlade/RegisteredApps)
and copy paste the Client-ID and Secret to the corresponding keys in you're **.env** file
(***LIVE_KEY*** and ***LIVE_SECRET***).

Note: You can't create a Microsoft Graph application throw your Ynov mail account.

## 💾 Setup a sqlite database

In you're **.env** file replace
From | To
--- | ---
`DB_CONNECTION=mysql` | `DB_CONNECTION=sqlite`
`DB_DATABASE=laravel` | `DB_DATABASE=Path_To_Your_Sqlite_File`

e.g `DB_DATABASE=/home/me/my_laravel_app/database/database.sqlite`

## 📜 License

The Laravel framework and this fork are open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
