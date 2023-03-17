</div>
    </div>
    <script>
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
    </script>
</body>

</html>