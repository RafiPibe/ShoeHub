<h1>Shoehub</h1>
<p>Framework Programming Final Project</p>

| Name                        | NRP        |
|-----------------------------|------------|
|Pascal Roger Junior Tauran   | 5025211072 |
|Faraihan Rafi Adityawarman   | 5025211074 |

## VIDEO

[Our video](https://youtu.be/_3lLdcdJXpk)

<p>We revised our project and implement Laravel Breeze instead of bareboning Laravel</p>

<p>Our Previous Work:</p>
https://github.com/RafiPibe/LaravelFramework-PBKK

To do list:
```
✅ Shopping Cart

✅ "Add to cart" button for each shoe

✅ Automatically send confirmation of purchase email once purchase is made (Job)
    - Needs Checkout information [ongoing]

✅ Item pricing

✅ Admin / Customer Service chat (live broadcasting) [ONGOING]

✅ Seeder for admin [isAdmin = 1]

✅ Home / welcome page
```
<p>How to add chat</p>

- go to https://dashboard.pusher.com
- make an account
- make a channel and name it anything (preferably "ShoeHub") and pick ap1 (southeast-Asia)
- Click the channel and go to "App keys"
- in there you can find the key for the chat feature.
- copy the key into the corresponding stuff in the env
- yippee now you can use the chat feature

<p>How to add mailing</p>

- Make a maitrap account
- Open settings in the mailtrap website and go to `SMPT settings`
- Click `show credentials` and copy the `host`, `port`, `username` and `password` over to the `.env` file
- Congrats mailing should now work

<p>User login logs</p>

- The user login logs are stored in `storage/logs/login.log`
- You can view them by running the command `storage/logs/login.log` in the terminal
- The logs would be cleared weekly but you can manually clear the logs with `php artisan log:clear`
