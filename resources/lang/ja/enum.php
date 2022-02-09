<?php

use App\Enums\UserType;

return [

  UserType::class => [
    UserType::Administrator => '管理者',
    UserType::Shopmanager => '店舗代表者',
    UserType::Customer => '利用者',
    UserType::SuperAdministrator => 'スーパー管理者',
  ],

  // ...
];
