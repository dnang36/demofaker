# Design Parttern

## Đề bài: demo các tính năng của package https://github.com/FakerPHP/Faker

### Thực hiện bởi: [Nguyễn Đoàn Đăng](https://github.com/dnang36)

### Download code và run code tại đường dẫn https://github.com/dnang36/demofaker

## Kiến thức nắm được:
1. Composer
- Composer là một công cụ quản lý các thư viện mà project PHP ( Dependency Management trong PHP,). Một cách chính xác hơn Composer quản lý sự phụ thuộc các tài nguyên trong dự án. Nó cho phép khai báo các thư viện mà dự án của bạn sử dụng, composer sẽ tự động tải code của các thư viện. Nó tạo ra các file cần thiết vào project của bạn, và cập nhật các thư viện khi có phiên bản mới.
- Trước đây khi bạn triển khai các dự án dựa trên các, bạn sẽ phải đối mặt một số việc sau:
  - Dự án của bạn có sử dụng một số thư viện ở ngoài. Bạn phải tải chúng rồi cho vào folder của project rồi mới sử dụng được.
  - Một số các thư viện đó lại sử dụng (phụ thuộc) các thư viện khác.
  - Bạn sẽ gặp những khó khăn trong việc cập nhật phiên bản của các thư viện. Nếu thư viện A, có sử dụng thư viện B, thư viện B sử dụng thư viện C. Thì nếu một trong các thư viện này có update, bạn sẽ phải tự mình lần mò về phần gốc của nó để update.
- Tuy nhiên, công việc sẽ thật dễ dàng với Composer, bạn sẽ làm được:
  - Khai báo các thư viện mà dự án sử dụng. Quản lý tập trung các thư viện đang sử dụng cho project và cả phiên bản của chúng dễ dàng qua file composer.json.
  - Tìm các phiên bản của package có thể cài đặt và cần thiết cho dự án, sau đó cài đặt chúng vào dự án tức là tải chúng về project.
- composer.json và composer.lock: Đây là 2 file rất quan trọng trong một package composer.
   - composer.json là nơi ta khai báo những dependencies dùng trong project, những thông tin về tên, phiên bản, licenses, source … Nội dung được viết theo JSON format
   - ví dụ:
```
{
  "name": "vendor_name/demofaker",
  "description": "description",
  "minimum-stability": "stable",
  "license": "proprietary",
  "authors": [
    {
      "name": "ad",
      "email": "email@example.com"
    }
  ],
  "require": {
    "fakerphp/faker": "^1.20"
  },
  "autoload": {
    "psr-4": {
      "src\\data\\": "src/"
    }
  }
}
```
  - composer.lock là nơi lưu trữ thông tin về dependencies đã được cài đặt. 
- các câu lệnh của composer:
  - init : Tạo ra file composer.json nhằm khai báo các thông tin cho package
  - install : Đọc thông tin từ file composer.json tại thư mục đang đứng, tổng hợp các package cần cài đặt, và cài đặt chúng vào một thư mục nào đó bên trong project.
  - update : Update những dependencies đã được cài đặt lên version mới nhất, đồng thời update nội dung vào file composer.lock
  - require : Add hoặc thay đổi nội dung một requirement vào file composer.json. Sau đó package được add vào hoặc thay đổi sẽ được cài đặt hoặc update.
  - dump-autoload : Update autoloader khi có khi có class mới tong classmap package.
  - ..... 

2. FakerPHP
- Faker là một thư viện PHP tạo dữ liệu giả cho bạn. 
- Cài đăt: Faker yêu cầu phiên bản PHP >= 7.1
```
composer require fakerphp/faker
```
- Sử dụng Faker\Factory::create() để tạo và khởi tạo trình tạo Faker, có thể tạo dữ liệu bằng cách truy cập các phương thức được đặt tên theo loại dữ liệu bạn muốn.
```
<?php
require_once 'vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// generate data by calling methods
echo $faker->name();
// 'Vince Sporer'
```
- Mỗi lệnh gọi đến $faker->name() cho ra một kết quả (ngẫu nhiên) khác nhau. Điều này là do Faker sử dụng magic method __call () và chuyển tiếp các lệnh gọi Faker\Generator->$method() tới định dạng Faker\Generator->($method,$thuộc tính).