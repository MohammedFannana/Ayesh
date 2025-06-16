// script to show action in table
//الاجراء
// document.addEventListener("DOMContentLoaded", function () {
//     document.querySelectorAll(".show-action").forEach(img => {
//         img.addEventListener("click", function () {
//             let actionDiv = this.nextElementSibling;
//             actionDiv.style.display = actionDiv.style.display === "none" ? "block" : "none";
//         });
//     });
// });


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".show-action").forEach(item => {
        item.addEventListener("click", function (event) {
            event.stopPropagation(); // يمنع إغلاق القائمة من كود الكلّي

            const actionMenu = this.parentElement.querySelector(".action");

            // إذا كانت القائمة ظاهرة، أخفِها
            if (actionMenu.style.display === "block") {
                actionMenu.style.display = "none";
            } else {
                // أخفِ كل القوائم الأخرى
                document.querySelectorAll(".action").forEach(menu => {
                    menu.style.display = "none";
                });

                // عرض القائمة الخاصة بالزر المضغوط
                actionMenu.style.display = "block";
            }
        });
    });

    // إغلاق القوائم عند النقر خارج أي قائمة
    document.addEventListener("click", function (event) {
        document.querySelectorAll(".action").forEach(menu => {
            if (!menu.contains(event.target)) {
                menu.style.display = "none";
            }
        });
    });
});


//this code to show image in input when create any thing need image
document.querySelectorAll('.hidden-file-style').forEach((input,index) => {
    input.addEventListener('change', function (event) {

        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {


            const reader = new FileReader();
            reader.onload = function (e) {

                // بنوصل للصورة داخل نفس العنصر الأب
                const wrapper = document.querySelectorAll('.custom-file-upload')[index] || input.closest('label');

                if (wrapper) {

                    const img = wrapper.querySelector('img');
                    if (img) {
                        img.classList.remove('show-image-label')
                        img.src = e.target.result;
                    }
                }
            };
            reader.readAsDataURL(file);
        }
    });
});
