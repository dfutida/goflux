function toggleDivEmbarcador() {
    document.getElementById("div_embarcador").style.display = 'block';
    document.getElementById("div_oferta").style.display = 'none';
    document.getElementById("div_lance").style.display = 'none';
}

function toggleDivOferta() {
    document.getElementById("div_oferta").style.display = 'block';
    document.getElementById("div_embarcador").style.display = 'none';
    document.getElementById("div_lance").style.display = 'none';
}

function toggleDivLance() {
    document.getElementById("div_lance").style.display = 'block';
    document.getElementById("div_embarcador").style.display = 'none';
    document.getElementById("div_oferta").style.display = 'none';
}