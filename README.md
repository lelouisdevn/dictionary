PROJECT: TỪ ĐIỂN TIẾNG ANH
github: https://github.com/lelouisdevn/dictionary

HỌC PHẦN CÔNG NGHỆ WEB CT275 - NHÓM 04.
----------------------------------------------

1. Mô tả dự án:
- Website từ điển tiếng anh hổ trợ người dùng tra từ, xem IPA và phát âm của từ.
- Khác với các từ điển song ngữ, dự án này nhằm xây dựng một từ điển định nghĩa, hổ trợ các ví dụ minh họa nhằm giúp người đọc hiểu hơn về ngữ nghĩa và cách sử dụng từ.
- Người dùng cũng có thể đăng ký thành viên để sử dụng một số chức năng khác của hệ thống như thêm từ vào danh sách, người dùng có thể xem lại các từ đã thêm một cách dễ dàng và đầy đủ.

2. Các công nghệ sử dụng:
- Website sử dụng các công nghệ cốt lõi trong xây dựng trang web như: HTML, CSS, JavaScript,...
- Sử dụng kỹ thuật AJAX để xử lý các lời gọi bất đồng bộ, thư viện để xây dựng captcha
- Xây dựng website theo mô hình MVC, quy hoạch các thành phần riêng biệt giúp cho quá trình phát triển, vận hành và bảo trị ứng dụng trở nên dễ dàng hơn.

Các công nghệ và thư viện:
1. jQuery: https://jquery.com/
2. Composer: https://getcomposer.org
3. Bootstrap: https://getbootstrap.com/
4. Vlucas/phpdotenv: https://packagist.org/packages/vlucas/phpdotenv
5. Gregwar/captcha: https://packagist.org/packages/gregwar/captcha
6. Illuminate Database: https://packagist.org/packages/illuminate/support
7. Font-awesome: https://fontawesome.com/


3. Cơ sở dữ liệu:
- Gồm 3 bảng:
+ user: lưu trữ thông tin cơ bản của người dùng như tên, ảnh đại diện, ngày tham gia,..
+ account: lưu trữ thông tin đăng nhập tài khoản của người dùng.
+ bookmark: lưu trữ các từ được người dùng thêm vào.

- dictionary API: sử dụng API để tra cứu từ được người dùng tìm kiếm.
Source: https://api.dictionaryapi.dev/api/v2/entries/en/dictionary

- File dictionary.sql: tạo cơ sở dữ liệu mẫu gồm các bảng như mô tả và một số mẫu dữ liệu.
Truy cập localhost/phpmyadmin, tạo cơ sở dữ liệu với tên "dictionary", import cơ sở dữ liệu.


4. Hướng phát triển:
- Phát triển thêm đa dạng loại từ (trạng từ, giới từ,...) do ứng dụng hiện chỉ hổ trợ tra cứu danh từ, do đó khi tra cứu một số từ thì chúng ta có thể gặp tình trạng "no definitions found".
- Tăng cường bảo mật cho ứng dụng web.
- Thêm các hổ trợ học từ như "wordQuiz", "thêm từ vào chỗ trống".

--------------------------------------------------
Đội ngũ phát triển.
Creator, mainainer, owner: Ngô Trần Vĩnh Thái. =)))

Copyright 2022 - 9999.