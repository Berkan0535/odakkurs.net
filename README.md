##README
# Odak Eğitim Kurumları - Kurumsal Web Sitesi

Bu proje, "Odak Eğitim Kurumları" için geliştirilmiş çok sayfalı, duyarlı (responsive) ve interaktif bir kurumsal web sitesidir. Site, kurumun LGS, YKS, ara sınıf kursları, öğrenci koçluğu ve deneme kulübü gibi hizmetlerini tanıtmaktadır.

---

##  TR (Türkçe)

### 📝 Proje Açıklaması

Bu proje, bir eğitim kurumunun (kurs merkezi) tüm hizmetlerini, şubelerini (Ödemiş ve Kiraz), misyonunu ve iletişim bilgilerini sergileyen tam kapsamlı bir web sitesidir. Site, `Tailwind CSS` ile stillendirilmiş ve `PHP` tabanlı bir sınav başvuru formu içermektedir.

### ✨ Temel Özellikler

* **Çok Sayfalı Yapı:** Her hizmet (LGS, YKS, 5-6-7. Sınıf, 9-10-11. Sınıf, Öğrenci Koçluğu, Deneme Kulübü) için ayrıntılı özel sayfalar.
* **Tam Duyarlı Tasarım (Responsive):** Tailwind CSS kullanılarak hem masaüstü hem de mobil cihazlar için optimize edilmiştir. Tüm sayfalarda mobil menü desteği bulunmaktadır.
* **İnteraktif Bileşenler:**
    * Ana sayfada `Swiper.js` ile güçlendirilmiş bir slider.
    * `xx.html` (Fotoğraflar) sayfasında `Fancybox` kullanan modern bir resim galerisi.
    * Tüm sayfalarda hem masaüstü hem de mobil için özel JavaScript ile yazılmış açılır menüler (dropdowns).
* **Harici Sistem Entegrasyonu:** Öğrenci Bilgi Sistemi için üç farklı `edesis.com` portalına yönlendirme yapılmaktadır (Kiraz Ortaokul-Lise, Ödemiş Ortaokul, Ödemiş Lise).
* **PHP Sınav Başvuru Formu:** `sinavbasvuru.html` sayfasında yer alan form, bilgileri `send_mail.php` dosyası aracılığıyla işler ve mail olarak gönderir.
* **Detaylı İletişim Sayfası:** Ödemiş ve Kiraz şubeleri için ayrı ayrı adres bilgileri ve gömülü Google Haritalar haritaları içerir.

### 🛠️ Kullanılan Teknolojiler

* **Frontend:**
    * HTML5
    * Tailwind CSS (CDN)
    * Vanilla JavaScript (Mobil menü, dropdownlar, interaktif butonlar için)
    * jQuery (Fancybox galerisi için)
    * Swiper.js (Ana sayfa slider)
    * Font Awesome (İkonlar)
* **Backend:**
    * PHP (Sınav başvuru formu için)

### 🚀 Nasıl Çalıştırılır?

Bu proje hem statik hem de dinamik (PHP) bileşenler içerir.

**1. Statik Sayfaları Görüntüleme:**

1.  Repoyu klonlayın veya dosyaları indirin.
2.  Herhangi bir `.html` dosyasına (örn: `odak/index.html`) çift tıklayarak tarayıcıda açabilirsiniz.

**2. PHP Formunu Çalıştırma (Gereklidir):**

`sinavbasvuru.html` sayfasındaki formun çalışması için bir PHP sunucusuna ihtiyacınız vardır.

1.  Tüm `odak` klasörünü XAMPP, MAMP, WAMP gibi yerel bir sunucunun `htdocs` veya `www` dizinine kopyalayın.
2.  Sunucunuzu başlatın.
3.  Tarayıcınızdan `http://localhost/odak/sinavbasvuru.html` adresine gidin.
4.  Formu doldurup göndermek, `send_mail.php` dosyasını tetikleyecektir.
    * *Not: `send_mail.php` dosyasının çalışması için yerel sunucunuzda (veya canlı sunucuda) bir SMTP yapılandırması (sendmail) gereklidir.*

---

## EN (English)

### 📝 Project Description

This is a multi-page, responsive, and interactive corporate website developed for "Odak Education Institutions." The site showcases the institution's services, including LGS (High School Entrance Exam) and YKS (University Entrance Exam) preparation, support classes, student coaching, and trial exam clubs.

### ✨ Key Features

* **Multi-Page Structure:** Detailed, dedicated pages for each service (LGS, YKS, 5-6-7th Grade, 9-10-11th Grade, Student Coaching, Exam Club).
* **Fully Responsive Design:** Optimized for both desktop and mobile devices using Tailwind CSS. Includes full mobile menu support on all pages.
* **Interactive Components:**
    * A homepage slider powered by `Swiper.js`.
    * A modern image gallery on `xx.html` (Photos) using `Fancybox`.
    * Custom JavaScript-powered dropdown menus for both desktop and mobile navigation.
* **External System Integration:** Links to three different `edesis.com` Student Information System portals (for Kiraz, Ödemiş Middle School, and Ödemiş High School).
* **PHP Exam Application Form:** The form on `sinavbasvuru.html` processes data and sends an email via the `send_mail.php` backend script.
* **Detailed Contact Page:** Includes separate addresses and embedded Google Maps for the Ödemiş and Kiraz branches.

### 🛠️ Technologies Used

* **Frontend:**
    * HTML5
    * Tailwind CSS (via CDN)
    * Vanilla JavaScript (for mobile menu, dropdowns, interactive buttons)
    * jQuery (Required for Fancybox)
    * Swiper.js (Homepage slider)
    * Font Awesome (Icons)
* **Backend:**
    * PHP (For the exam application form)

### 🚀 How to Run

This project contains both static files and dynamic (PHP) components.

**1. Viewing Static Pages:**

1.  Clone the repository or download the files.
2.  You can open any `.html` file (e.g., `odak/index.html`) directly in your browser by double-clicking it.

**2. Running the PHP Form (Required):**

A PHP server is required for the exam application form on `sinavbasvuru.html` to work.

1.  Copy the entire `odak` folder into the `htdocs` or `www` directory of a local server like XAMPP, MAMP, or WAMP.
2.  Start your local server.
3.  Access the site in your browser via `http://localhost/odak/sinavbasvuru.html`.
4.  Submitting the form will trigger the `send_mail.php` script.
    * *Note: A proper SMTP (sendmail) configuration on your local or live server is necessary for `send_mail.php` to successfully send emails.*
