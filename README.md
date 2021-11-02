# Example usage to get all user images using the pivot table.

```php
15:11 $ art tinker
Psy Shell v0.9.3 (PHP 7.2.5-0ubuntu0.18.04.1 — cli) by Justin Hileman
>>> App\User::first()->images;
=> Illuminate\Database\Eloquent\Collection {#2321
     all: [
       App\Image {#2315
         id: 1,
         image_name: "1asdasdas",
         created_at: "2018-05-29 19:12:26",
         updated_at: "2018-05-29 19:12:31",
         deleted_at: null,
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2318
           user_id: 1,
           id: 1,
         },
       },
     ],
   };
   
   
   >>> App\Image::first()->users
   => Illuminate\Database\Eloquent\Collection {#2321
        all: [
          App\User {#2315
            id: 1,
            name: "test",
            email: "test@test.com",
            created_at: "2018-05-21 17:46:57",
            updated_at: "2018-05-21 17:46:57",
            image_md5_sum: null,
            image_name: null,
            pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2318
              image_id: 1,
              id: 1,
            },
          },
        ],
      }


```
