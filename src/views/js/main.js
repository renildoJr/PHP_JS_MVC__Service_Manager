function sayHi(link) {
    if(select.value == 'null') {
        window.location.href = link;
    }
}

const select = document.querySelector(".select");
select.addEventListener("change", () => {
    sayHi("/categoriaServico/form");
});

console.log(select)