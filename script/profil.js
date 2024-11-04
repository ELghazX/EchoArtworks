function openModal(imageSrc, caption, likes, time) {
    // Dapatkan elemen modal dan masukkan konten ke dalamnya
    document.getElementById("modalImage").src = imageSrc;
    document.getElementById("modalCaption").innerText = caption;
    // document.getElementById("modalLikes").innerText = `Likes: ${likes}`;
    document.getElementById("modalTime").innerText = time;
    
    
    // Atur URL untuk unduhan
    document.getElementById("downloadBtn").href = imageSrc;
    
    // Kosongkan komentar sebelumnya saat modal dibuka kembali
    document.getElementById("commentsSection").innerHTML = "";

    // Tampilkan modal
    document.getElementById("postModal").style.display = "flex";
}

function closeModal() {
    // Sembunyikan modal
    document.getElementById("postModal").style.display = "none";
}

let liked = false;
let likeCount = 0;

function toggleLike() {
    const heartIcon = document.querySelector('#modalLikes i');
    const likeCounter = document.getElementById('likeCount');

    liked = !liked;  // Toggle status
    heartIcon.classList.toggle('active', liked);
    
    if (liked) {
        likeCount++;
    } else {
        likeCount--;
    }
    
    likeCounter.textContent = likeCount;  // Update jumlah like
}

function addComment(event) {
    // Tambahkan komentar saat pengguna menekan Enter
    if (event.key === "Enter") {
        const commentInput = document.getElementById("commentInput");
        const commentsSection = document.getElementById("commentsSection");

        // Placeholder untuk username (nanti dapat digantikan oleh backend)
        const username = "User123";
        const newComment = commentInput.value.trim();

        if (newComment !== "") {
            // Buat elemen div untuk komentar
            const commentContainer = document.createElement("div");
            commentContainer.classList.add("comment");

            // Buat elemen span untuk username
            const userSpan = document.createElement("span");
            userSpan.classList.add("comment-username");
            userSpan.textContent = username;

            // Buat elemen paragraf untuk komentar baru
            const commentParagraph = document.createElement("p");
            commentParagraph.classList.add("comment-text");
            commentParagraph.textContent = newComment;

            // Tambahkan style pada container komentar
            commentContainer.style.border = "1px solid black";
            commentContainer.style.padding = "5px";
            commentContainer.style.marginBottom = "5px";
            commentContainer.style.borderRadius = "5px";

            // Gabungkan username dan komentar ke dalam container
            commentContainer.appendChild(userSpan);
            commentContainer.appendChild(commentParagraph);

            // Tambahkan container ke dalam commentsSection
            commentsSection.appendChild(commentContainer);

            // Kosongkan input setelah menambahkan komentar
            commentInput.value = "";
        }
    }
}

