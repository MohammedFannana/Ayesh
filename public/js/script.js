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
            event.stopPropagation(); // Prevent click from propagating
            let actionMenu = this.parentElement.querySelector(".action");

            // Hide all other action menus before showing the clicked one
            document.querySelectorAll(".action").forEach(menu => {
                if (menu !== actionMenu) {
                    menu.style.display = "none";
                }
            });

            // Toggle the clicked action menu
            actionMenu.style.display = (actionMenu.style.display === "block") ? "none" : "block";
        });
    });

    // Hide the menu when clicking anywhere outside
    document.addEventListener("click", function (event) {
        document.querySelectorAll(".action").forEach(menu => {
            if (!menu.contains(event.target)) {
                menu.style.display = "none";
            }
        });
    });
});
