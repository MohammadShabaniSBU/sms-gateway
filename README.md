# Sms Gateway

It is a sample sms gateway with a mock and kavenegar provider.

## How to run
You need `docker`, `docker-compose` and `npm` to run.
```bash
docker-compose up -d
docker-compose exec sms-gateway composer i
docker-compose exec sms-gateway cp .env.example .env
docker-compose exec sms-gateway php artisan key:generate
docker-compose exec sms-gateway php artisan migrate --seed
npm i
npm run prod
```


## How to use
You can see the [API documentation](https://documenter.getpostman.com/view/18401078/UzBjsTr6).
There is a default user with credentianals
+ `email: admin@example.com`
+ `password: password` 
To add another provider you just need to add a channel in `app/Channels` to send the sms and return it in `App\Services\SmsService::getProvider` method.

The default queue is rabbitmq.
The queue will run by supervisor.
The `App\Services\SmsSerivce::getProvider` method is defined to choose the provider. By now it is hard coded to choose `App\Channels\MockSmsChannel`.
