document.addEventListener("DOMContentLoaded", (event) => { //espera a que el documento este completamente cargado
    if (window.location.search.includes("ok=")) { //busca si la url contiene el parametro ok
        /**
         * Creates a new URL object representing the current window location.
         * 
         * @constant {URL} url - The URL object of the current window location.
         */
        const url = new URL(window.location); //crea un objeto URL de la ubicación actual de la ventana
        url.searchParams.delete("ok"); //elimina el parametro ok de la url
        window.history.replaceState({}, document.title, url); //reemplaza la url actual con la nueva url sin el parametro ok
    }
});