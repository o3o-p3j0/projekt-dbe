// Eingabefelder
document.getElementById("resetten").addEventListener("click", resetten);

function resetten() {
    document.getElementById("filterFormNeuesFzg").reset();
    document.getElementById("fzgAendern").reset();
    document.querySelector("#suche").style.display="inline-block";
    document.querySelector("#aendern").style.display="none";
}
