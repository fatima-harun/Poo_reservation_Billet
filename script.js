function calculerPrix() {
    var paysDestination = document.getElementById("pays").value;
    var prix = 0;

    // Logique pour calculer le prix en fonction des pays de départ et de destination
    if (paysDestination === "1") {
        prix = 350000; // Par exemple, prix pour Dakar-New York
    } else if (paysDestination === "2") {
        prix = 450000; // Par exemple, prix pour Dakar-Madrid
    } else if (paysDestination === "3") {
        prix = 150000; // Par exemple, prix pour Dakar-Casablanca
    }
    // Ajoutez d'autres cas selon vos besoins

    // Met à jour le champ de prix dans le formulaire
    document.getElementById("prix").value = prix;
}
