## About Provider

# Kindly follow these steps to setup providers project on your local machine.

- git clone the project

- run composer install 

- run ./vendor/bin/sail up to get the docker up.

## Endpoints 

- check {local_domain}/api/v1/users <br>
This will get all the providers with their actual data.

- you can start filter according to some conditions for example:
- provider -> DataProviderX
- currency -> USD
- balanceMin and balanceMax
- statusCode -> authorised

## New Provider

- to add a new provider kindly follow these steps : 
- add a new array into the provider array in ProviderService.php <br>
Ex : 
'DataProviderZ' => 
    [
        'balanceFinal' => 'amount',
        'currencyName' => 'currency',
        'emailProvider' => 'email',
        'status' => 'status',
        'registration_date' => 'data',
        'identify' => 'id'
    ]

- add the available status to this provider in the status array <br>
protected $statuses = [
    'authorised' => [1, 100, 1000],
    'decline' => [2, 200, 2000],
    'refunded' => [3, 300, 3000]
];

- add the provider Json file in storage/app/public/newProvider/newProvider.json

- run the API with the new provider selected


## API Collection 

- kindly check this api collection which has a sample of the API that you can use for testing. <br>
https://www.getpostman.com/collections/a2f8461c0cc1b0b979ce

