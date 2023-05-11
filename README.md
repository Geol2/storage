# storage

SDK 기능을 제공

## 추가 방법

사용하고자 하는 프로젝트에 다음과 같은 과정을 거친다

composer 의존성 관리 도구는 별도로 설치하도록 한다

```json
{
    "require": {
        "geol/storage": "1.0"
    }
}
```

```php
composer install
composer update
```

## 파일저장
### StorageClient

서비스에서의 파일 데이터를 받아 연결된 파일 서버로 전송하기 위한 명세서

#### 업로드
```php
require 'vendor/autoload.php';

use Geol\File\StorageClient;

$bucket = $_POST['bucket'];
$stoken = $_POST['stoken'];
$folder = $_POST['folder'];
$fileData = $_FILES['file_data'];

// 서비스에서 사용할 로직
$client = new StorageClient();
$client->upload($bucket, $stoken, $folder, $fileData);
```

#### 풀경로 삭제
```php
require 'vendor/autoload.php';

use Geol\File\StorageClient;

$stoken = $_POST['stoken'];
$fullPath = $_POST['path'];
$client = new StorageClient();
$client->deleteFullPath($stoken, $fullPath);
```

#### 버킷 경로에서부터 삭제
```php
require 'vendor/autoload.php';

use Geol\File\StorageClient;

$bucket = $_POST['bucket'];
$stoken = $_POST['stoken'];
$localPath = $_POST['path'];
$client = new StorageClient();
$client->deleteLocalPath($bucket, $stoken, $localPath);
```