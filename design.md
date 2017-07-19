-Installing latest laravel version an on 16/7/2017
-Creating mysql database named "ruts".
-Configuring .env file accordingly.
-Setting up laravel basic auth.
	--run "php artisan make:auth" and "php artisan migrate".
	--adding email confirmation on registration.
-Setting up advanced social login
	--Adding socialite to package dependencies by running "composer require laravel/socialite".
	--Adding "Laravel\Socialite\SocialiteServiceProvider::class," to the providers array of config/app.php.
	--Adding socialite facade "'Socialite' => Laravel\Socialite\Facades\Socialite::class," to the aliases array in config/app.php.
	--Google Oauth2 client id "1024865228893-6fkcju20kudcumos8ddcm4b5el9g74g0.apps.googleusercontent.com".
	--Google Oauth2 secret "-thYH-5rdMREky_NLnU4tRxX".
	--Google Oauth2 redirect "http://ruts.me/google/callback".
		---Setting these in .env and using in config/services.php.

	
