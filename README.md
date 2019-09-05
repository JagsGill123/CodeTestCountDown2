# CodeTestCountDown - Docker environment
==================================

How to run:

  * Clone Project
  * ensure mysql is not already running on machine
  * Ensure docker installed and run 
    *  `docker-compose up -d nginx mysql workspace ` from /laradock (will take a while)
    *  enter docker container using `docker-compose exec workspace bash`
        * and run `composer install`
        * and create db with `php artisan migrate`
    * site should be available at http://localhost   
    
    
Reasonings for:
   
   * Front End 
        - In real website would try to create a better user experience using AJAX. Current approach implemented is traditional POST and redirect
        - also would use laravel mix and webpack in real project to make managing the js easier instead of cdn
        
   * Backend 
        - added a relatively flexible crud controller system that can be reused for other object and could be extended on to be a full CMS
        - possible improvement would be to add a CountDownRepository to separate CRUD Logic 
        from the Controller so they can be used in other controllers if needed for custom logic
          
