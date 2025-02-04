<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLUEDO - Page Jeu</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function handleDragStart(event) {
            event.dataTransfer.setData("text/plain", event.target.innerText);
        }

        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event) {
            event.preventDefault();
            const data = event.dataTransfer.getData("text/plain");
            const textarea = document.querySelector('textarea[name="requete_sql"]');
            textarea.value += data + " ";
        }

        function clearForm(oForm) {
            oForm.reset();
            for (let element of oForm.elements) {
                switch (element.type.toLowerCase()) {
                    case "text":
                    case "password":
                    case "textarea":
                    case "hidden":
                        element.value = "";
                        break;
                    case "radio":
                    case "checkbox":
                        element.checked = false;
                        break;
                    case "select-one":
                    case "select-multi":
                        element.selectedIndex = -1;
                        break;
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 m-10 min-h-screen">
    <nav class="text-black py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <a href="jsp.html" class="return-link"><img src="images/documentationpng.png" alt="documentation" class="m-4"></a>
                <a href="jsp.html" class="return-link"><img src="images/retour.png" alt="retour" class="m-4"></a>
            </div>
            <div class="flex items-center">
                <a href="vues/mld.html" class="return-link"><img src="images/basedonneepng.png" alt="bdd" class="m-4"></a>
                <a href="jsp.html" class="return-link"><img src="images/indice.png" alt="indice" class="m-4"></a>
                <a href="jsp.html" class="return-link"><img src="images/connexion_petit.png" alt="connexion" class="m-4"></a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto flex mt-8">
        <div class="w-3/4 p-4">
            <!-- Affichage des erreurs -->
            {% if dVueErreur is defined and dVueErreur|length > 0 %}
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4">
                    <h2>Attention !</h2>
                    <ul>
                        {% for erreur in dVueErreur %}
                            <li>{{ erreur }}</li>
                        {% endfor %}
                    </ul>
                </div>
            {% endif %}

            <!-- Formulaire de requête SQL -->
            <form method="post" action="index.php" name="formulaireSQL" class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2">Requêtes SQL</label>
                <textarea name="requete_sql" class="w-full h-48 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Écrivez votre requête SQL ici..." ondragover="handleDragOver(event)" ondrop="handleDrop(event)"></textarea>
                <input type="hidden" name="action" value="executerRequete">
                <button type="submit" class="mt-2 bg-black text-white px-4 py-2 rounded-lg">Valider</button>
            </form>

            <!-- Tableau de réponse -->
            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2">Tableau de réponse</label>
                <div class="w-full border border-gray-300 rounded-lg p-4">
                    <!-- Affichage des résultats -->
                    {% if dVue.resultats is not empty %}
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    {% for column in dVue.resultats[0]|keys %}
                                        <th class="px-4 py-2">{{ column }}</th>
                                    {% endfor %}
                                </tr>
                            </thead>
                            <tbody>
                                {% for row in dVue.resultats %}
                                    <tr>
                                        {% for cell in row %}
                                            <td class="border px-4 py-2">{{ cell }}</td>
                                        {% endfor %}
                                    </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    {% elseif dVueErreur is empty and dVue.resultats is defined %}
                        <!-- Si la requête n'a retourné aucun résultat -->
                        <p>Aucun résultat trouvé.</p>
                    {% endif %}
                </div>
            </div>

            <!-- Formulaire de réponse utilisateur -->
            <form method="post" action="index.php" name="formulaireReponse" class="flex items-center">
                <input type="text" name="reponse_utilisateur" id="responseField" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Réponse">
                <input type="hidden" name="action" value="verifierReponse">
                <button type="submit" class="ml-4 bg-black text-white px-6 py-3 rounded-lg">Valider</button>
                <button type="button" class="ml-4 bg-gray-300 text-black px-6 py-3 rounded-lg" onclick="clearForm(document.formulaireReponse)">Effacer</button>
            </form>
        </div>

        <!-- Liste des blocs SQL drag & drop -->
        <div class="w-1/4 p-4 bg-purple-100 rounded-lg">
            <ul class="space-y-2 text-gray-800 font-medium">
                {% for bloc in ["Select", "Where", "From", "Join", "On", "And", "Order By", "Group By", "Having", "Full Join", "Left Join", "Right Join"] %}
                    <li class="p-2 hover:bg-purple-200 rounded-md cursor-pointer" draggable="true" ondragstart="handleDragStart(event)">{{ bloc }}</li>
                {% endfor %}
            </ul>
        </div>
    </div>
</body>
</html>
