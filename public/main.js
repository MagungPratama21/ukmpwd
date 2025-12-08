document.addEventListener("DOMContentLoaded", () => {
    const mobileToggle = document.getElementById("mobile-toggle");
    const mobileMenu = document.querySelector(".mobile-menu");

    if (mobileToggle) {
        mobileToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("show");
        });
    }

    const loadingOverlay = document.getElementById("loadingOverlay");
    const successPopup = document.getElementById("successPopup");

    function showLoading() {
        if (loadingOverlay) loadingOverlay.style.display = "flex";
    }

    function hideLoading() {
        if (loadingOverlay) loadingOverlay.style.display = "none";
    }

    function showSuccess(message = "Pendaftaran berhasil dikirim!") {
        if (!successPopup) return;

        successPopup.style.display = "flex";
        successPopup.querySelector("span").innerText = message;

        setTimeout(() => {
            successPopup.classList.add("hide");
        }, 2000);

        setTimeout(() => {
            successPopup.style.display = "none";
            successPopup.classList.remove("hide");
        }, 2500);
    }

    const form = document.getElementById("formPendaftaran");

    if (form) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();

            showLoading();

            setTimeout(() => {
                hideLoading();
                showSuccess("Pendaftaran berhasil dikirim!");

            }, 1500);
        });
    }

    const uploadZone = document.querySelector(".upload-zone");

    if (uploadZone) {

        uploadZone.addEventListener("click", () => {
            const fileInput = uploadZone.querySelector("input[type='file']");
            if (fileInput) fileInput.click();
        });

        uploadZone.addEventListener("dragenter", () => {
            uploadZone.classList.add("hover");
        });

        uploadZone.addEventListener("dragleave", () => {
            uploadZone.classList.remove("hover");
        });

        uploadZone.addEventListener("dragover", (e) => {
            e.preventDefault();
            uploadZone.classList.add("hover");
        });

        uploadZone.addEventListener("drop", (e) => {
            e.preventDefault();
            uploadZone.classList.remove("hover");

            const fileInput = uploadZone.querySelector("input[type='file']");
            if (fileInput) {
                fileInput.files = e.dataTransfer.files;
                showSuccess("File berhasil diunggah!");
            }
        });
    }

    window.scrollToTop = function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };
});
