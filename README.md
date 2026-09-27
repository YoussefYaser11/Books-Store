# مكتبة بُعد — Laravel 12

هذه نسخة Laravel من مشروع PHP الأصلي، مع الحفاظ على الوظائف الأساسية والواجهة العربية ومسارات الموقع، وتحويل منطق قاعدة البيانات والجلسات والصلاحيات إلى Laravel/Eloquent/Blade.

## المتطلبات
- PHP 8.2 أو أحدث
- MySQL 5.7+/8.x أو MariaDB متوافق
- Composer
- امتدادات PHP: PDO MySQL, Mbstring, OpenSSL, Fileinfo

## التشغيل على Windows / XAMPP
1. فك الضغط.
2. افتح CMD داخل مجلد المشروع.
3. نفّذ:

```bash
composer install
copy .env.example .env
php artisan key:generate
```

4. افتح `.env` وتأكد من:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=books
DB_USERNAME=root
DB_PASSWORD=
```

5. إذا كانت قاعدة البيانات القديمة `books` موجودة بالفعل، خذ Backup أولًا ثم شغّل:

```bash
php artisan migrate
php artisan storage:link
```

الـmigration متوافق مع الجداول القديمة ويحاول إنشاء الجداول الإضافية التي يحتاجها المتجر دون حذف بيانات الجداول الموجودة.

6. شغّل المشروع:

```bash
php artisan serve
```

ثم افتح: http://127.0.0.1:8000

لوحة الإدارة: http://127.0.0.1:8000/admin/login

## قاعدة بيانات جديدة
يمكنك إنشاء قاعدة `books` فارغة في MySQL ثم تشغيل:

```bash
php artisan migrate
```

وسيتم إنشاء الجداول التي يحتاجها المشروع.

## صور الكتب القديمة
إذا كانت قاعدة البيانات القديمة تحتوي على قيم في عمود `image` تشير إلى ملفات رفع قديمة، انسخ مجلد صور الكتب القديم إلى `storage/app/public/books` وعدّل قيم `image` عند الحاجة لتكون مثل `books/filename.jpg`.

## ملاحظات
- الدفع يظل عبر InstaPay، ثم يتم فتح WhatsApp Web لإرسال تفاصيل الطلب كما كان في المشروع الأصلي.
- رفع صور الكتب أصبح عبر Laravel Storage.
- لا يتم تشغيل ملفات PHP القديمة مباشرة؛ المشروع الآن يعمل من خلال Laravel routes/controllers/views.
