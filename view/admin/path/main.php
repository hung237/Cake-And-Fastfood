
    <?php
        include "./components/sales.php";
        error_reporting(4);
        $action = $_GET['act'] ?: "home";
        switch ($action) {
            case 'home':
                include "./components/home.php";
                break;
            case 'addproduct':
                include "./components/add-product.php";
                break;
            case 'listproduct':
                include "./components/list-product.php";
                break;
            case 'editproduct':
                include "./components/update-product.php";
                break;
            case 'listuser':
                include "./components/list-user.php";
                break;
            case 'adduser':
                include "./components/add-user.php";
                break;
            case 'edituser':
                include "./components/update-user.php";
                break;
            case 'bill':
                include "./components/bill.php";
                break;
            case 'orderdetail':
                include "./components/order-detail.php";
                break;
            case 'logout':
                include "../list-product.php";
                break;
            case 'order-detail':
                include "./components/order-detail.php";
                break;
        }
    ?>

</div>

    </div>

    <script>
          let items = document.querySelectorAll('.item');
let action = document.getElementById('action');
let icondowns = document.querySelectorAll('.fa-chevron-down');


items.forEach(item => {
    item.addEventListener('click', function(e){
        if( this.classList.contains('active') || e.target.classList.contains('fa-chevron-down')){
            return;
        }
        items.forEach(remove_active => {
            remove_active.classList.remove('active');
        });
        console.log(e.target);
        this.classList.add('active');
        document.documentElement.style.setProperty('--height-begin', action.offsetHeight + 'px');
        document.documentElement.style.setProperty('--top-begin', action.offsetTop + 'px');
        document.documentElement.style.setProperty('--height-end', this.offsetHeight + 'px');
        document.documentElement.style.setProperty('--top-end', this.offsetTop + 'px');
        action.classList.remove('runanimation');
        void action.offsetWidth;
        action.classList.add('runanimation');
    },false)
})
icondowns.forEach(icon =>{
    icon.addEventListener('click', function(){
        this.classList.toggle('showMenuChild');
        items.forEach(item => {
            if(item.classList.contains('active')){
                document.documentElement.style.setProperty('--height-end', item.offsetHeight + 'px');
                document.documentElement.style.setProperty('--top-end', item.offsetTop + 'px');
                return;
            }
        });
    })
})

        const avatarInput = document.getElementById("avatar");
        const avatarPreview = document.getElementById("avatar-preview");

        avatarInput.addEventListener("change", function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function () {
                    avatarPreview.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            } else {
                avatarPreview.setAttribute("src", "default-avatar.jpg");
            }
        });

        const avtInput = document.getElementById("avatar-user");
        const avtPreview = document.getElementById("avatar-input");

        avtInput.addEventListener("change", function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function () {
                    avtPreview.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            } else {
                avatarPreview.setAttribute("src", "default-avatar.jpg");
            }
        });
    </script>
</body>
</html>