# Sms Gateway

It is a sample sms gateway with a mock and kavenegar provider.

## How to run
You need `docker`, `docker-compose` and `npm` to run.
```bash
bash init.sh
```
To stop the app you can run

```bash
docker-compose down
```

And to run it again, just need to run 
```bash
docker-compose up -d
```

## How to use
You can see the [API documentation](https://documenter.getpostman.com/view/18401078/UzBjsTr6).
There is a default user with credentianals
+ `email: admin@example.com`
+ `password: password` 

To add another provider you just need to add a channel in `app/Channels` to send the sms and return it in `App\Services\SmsService::getProvider` method.

The default queue is rabbitmq.

The queue will be ran by supervisor.

The `App\Services\SmsSerivce::getProvider` method is defined to choose the provider. By now it is hard coded to choose `App\Channels\MockSmsChannel`.

To use kavenegar provider you need fill KAVENEGAR_API_KEY and KAVENEGAR_NUMBER keys in .env and return `App\Channels\KavenegarSmsProvider::class` in `App\Services\SmsService::getProvider` (hope it works 😅).  