document.addEventListener("click", function (e) {
  const link = e.target.closest('a[data-summaro-copy="1"]');
  if (!link) return;

  e.preventDefault();

  const url = link.getAttribute("href");
  if (!url) return;

  navigator.clipboard.writeText(url).then(() => {
    link.classList.add("summaro-copied");

    setTimeout(() => {
      link.classList.remove("summaro-copied");
    }, 1500);
  });
});
