# blogs-management-website

نظام إدارة تدوين متكامل ومستجيب (Responsive) تم بناؤه باستخدام **Laravel** ومحرك القوالب **Blade**. يوفر المنصة بيئة مثالية لنشر المقالات، إدارة المستخدمين، والتفاعل مع الجمهور.

---

## 🌟 الميزات الرئيسية (Key Features)

- **📝 إدارة المقالات (Blog Management):** نظام CRUD كامل (إضافة، عرض، تعديل، حذف) مع دعم التصنيفات.
- **💬 نظام التعليقات (Commenting System):** إمكانية التفاعل المباشر بين الزوار والمدونة.
- **👥 إدارة المستخدمين (Authentication & Auth):** تسجيل دخول، حماية المسارات، ولوحة تحكم بسيطة.
- **📩 نظام المشتركين (Subscription System):** جمع البريد الإلكتروني للمهتمين بمتابعة المحتوى الجديد.
- **📧 نموذج التواصل (Contact Form):** واجهة متكاملة لاستقبال رسائل الزوار واستفساراتهم.

---

## 🛠 التقنيات المستخدمة (Tech Stack)

- **Framework:** [Laravel](https://laravel.com)
- **Frontend:** Blade Templates, CSS (Bootstrap/Tailwind)
- **Database:** MySQL (Eloquent ORM)
- **Language:** PHP
- **library:** breeze(Auth) 

---

## ⚙️ التثبيت والتشغيل (Setup & Installation)

1. **نسخ المستودع (Clone the Repo):**
 ```  
   git clone https://github.com/MoussaAlsgehir/blogs-management-website.git
```
 3. **تحميل المكتبات (Install Dependencies):**
   ```
composer install
npm install
rpm run dev or run build 
   ```
  
 3. **إعداد البيئة (Configure Environment):**
   * قم بنسخ ملف .env.example إلى .env.
   * قم بتحديث بيانات قاعدة البيانات.
   ```
   php artisan key:generate
```




  
 4. **تهجير قاعدة البيانات (Database Migration):**
   ```
   php artisan migrate
   ```
   
  
 5. **تشغيل المشروع (Run Server):**
   ```
   php artisan serve
   ```
   
  
## 📂 هيكلية قاعدة البيانات (DB Schema)
يحتوي المشروع على الجداول الأساسية التالية:
 * users: لإدارة الحسابات
 * blogs: لتخزين المقالات
 * comments: لربط التعليقات بالمقالات
 * subscribers: لتخزين القائمة البريدية
 * contacts: لاستقبال الرسائل
**تم التطوير بواسطة:** [Moussa Alsgehir]
```
