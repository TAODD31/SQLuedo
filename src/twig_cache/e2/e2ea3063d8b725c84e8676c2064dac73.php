<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* vueJeu.html */
class __TwigTemplate_586ca85d9b5f53f23577f3e818b2b05d extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>SQLUEDO - Page Jeu</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <script>
        function handleDragStart(event) {
            event.dataTransfer.setData(\"text/plain\", event.target.innerText);
        }

        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event) {
            event.preventDefault();
            const data = event.dataTransfer.getData(\"text/plain\");
            const textarea = document.querySelector('textarea[name=\"requete_sql\"]');
            textarea.value += data + \" \";
        }

        function clearForm(oForm) {
            oForm.reset();
            for (let element of oForm.elements) {
                switch (element.type.toLowerCase()) {
                    case \"text\":
                    case \"password\":
                    case \"textarea\":
                    case \"hidden\":
                        element.value = \"\";
                        break;
                    case \"radio\":
                    case \"checkbox\":
                        element.checked = false;
                        break;
                    case \"select-one\":
                    case \"select-multi\":
                        element.selectedIndex = -1;
                        break;
                }
            }
        }
    </script>
</head>
<body class=\"bg-gray-50 m-10 min-h-screen\">
    <nav class=\"text-black py-4\">
        <div class=\"container mx-auto flex justify-between items-center\">
            <div class=\"flex items-center\">
                <a href=\"/SQLuedo/src/templates/documentationSQL.html\" target=\"_blank\" class=\"return-link\"><img src=\"/SQLuedo/src/images/documentationpng.png\" alt=\"documentation\" class=\"m-4\"></a>
                <a href=\"/SQLuedo/src/\" class=\"return-link\"><img src=\"/SQLuedo/src/images/retour.png\" alt=\"retour\" class=\"m-4\"></a>
            </div>
            <div class=\"flex items-center\">
                <!-- <a href=\"#\" class=\"return-link\"><img src=\"/SQLuedo/src/images/basedonneepng.png\" alt=\"bdd\" class=\"m-4\"></a> -->
                <!-- <a href=\"#\" class=\"return-link\"><img src=\"/SQLuedo/src/images/indice.png\" alt=\"indice\" class=\"m-4\"></a> -->
                <!-- <a href=\"#\" class=\"return-link\"><img src=\"/SQLuedo/src/images/connexion_petit.png\" alt=\"connexion\" class=\"m-4\"></a> -->
            </div>
        </div>
    </nav>

    <div class=\"container mx-auto flex mt-8\">
        <div class=\"w-3/4 p-4\">
            <!-- Affichage des erreurs -->
                ";
        // line 65
        if ((array_key_exists("dVueErreur", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["dVueErreur"] ?? null)) > 0))) {
            // line 66
            yield "                <div class=\"bg-red-100 text-red-800 p-4 rounded-lg mb-4\">
                    <h2>Attention !</h2>
                    <ul>
                        ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["dVueErreur"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["erreur"]) {
                // line 70
                yield "                            <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["erreur"], "html", null, true);
                yield "</li>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['erreur'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            yield "                    </ul>
                </div>
            ";
        }
        // line 75
        yield "
            <!-- Formulaire de requête SQL -->
            <form method=\"post\" action=\"ValidationJeuFormulaireExecution\" name=\"formulaireSQL\" class=\"mb-4\">
                <label class=\"block text-gray-700 text-lg font-bold mb-2\">Requêtes SQL</label>
                <textarea name=\"requete_sql\" class=\"w-full h-48 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600\" placeholder=\"Écrivez votre requête SQL ici...\" ondragover=\"handleDragOver(event)\" ondrop=\"handleDrop(event)\"></textarea>
                <button type=\"submit\" class=\"mt-2 bg-black text-white px-4 py-2 rounded-lg\">Valider</button>
            </form>

            <!-- Tableau de réponse -->
            <div class=\"mb-4\">
                <label class=\"block text-gray-700 text-lg font-bold mb-2\">Tableau de réponse</label>
                <div class=\"w-full border border-gray-300 rounded-lg p-4\">
                    <!-- Affichage des résultats -->
                    ";
        // line 88
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["dVue"] ?? null), "resultats", [], "any", false, false, false, 88))) {
            // line 89
            yield "                        <table class=\"table-auto w-full\">
                            <thead>
                                <tr>
                                    ";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::keys((($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["dVue"] ?? null), "resultats", [], "any", false, false, false, 92)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null)));
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 93
                yield "                                        <th class=\"px-4 py-2\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["column"], "html", null, true);
                yield "</th>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['column'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            yield "                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["dVue"] ?? null), "resultats", [], "any", false, false, false, 98));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 99
                yield "                                    <tr>
                                        ";
                // line 100
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["row"]);
                foreach ($context['_seq'] as $context["_key"] => $context["cell"]) {
                    // line 101
                    yield "                                            <td class=\"border px-4 py-2\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cell"], "html", null, true);
                    yield "</td>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['cell'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                yield "                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['row'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 105
            yield "                            </tbody>
                        </table>
                    ";
        } elseif ((Twig\Extension\CoreExtension::testEmpty(        // line 107
($context["dVueErreur"] ?? null)) && CoreExtension::getAttribute($this->env, $this->source, ($context["dVue"] ?? null), "resultats", [], "any", true, true, false, 107))) {
            // line 108
            yield "                        <!-- Si la requête n'a retourné aucun résultat -->
                        <p>Aucun résultat trouvé.</p>
                    ";
        }
        // line 111
        yield "                </div>
            </div>

            <!-- Formulaire de réponse utilisateur -->
            <form method=\"post\" action=\"ValidationJeuFormulaireVerifier\" name=\"formulaireReponse\" class=\"flex items-center\">
                <input type=\"text\" name=\"reponse_utilisateur\" id=\"responseField\" class=\"w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600\" placeholder=\"Réponse\">
                <button type=\"submit\" class=\"ml-4 bg-black text-white px-6 py-3 rounded-lg\">Valider</button>
                <button type=\"button\" class=\"ml-4 bg-gray-300 text-black px-6 py-3 rounded-lg\" onclick=\"clearForm(document.formulaireReponse)\">Effacer</button>
            </form>
            ";
        // line 120
        if (array_key_exists("dVueVerif", $context)) {
            // line 121
            yield "            <div class=\"bg-red-100 text-red-800 p-4 rounded-lg mb-4 \">
                <p>Reponce Incorrecte.</p>
            </div>
            ";
        }
        // line 125
        yield "        </div>


        <!-- Liste des blocs SQL drag & drop -->
        <div class=\"w-1/4 p-4 bg-purple-100 rounded-lg\">
            <ul class=\"space-y-2 text-gray-800 font-medium\">
                ";
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(["Select", "Where", "From", "Join", "On", "And", "Order By", "Group By", "Having", "Full Join", "Left Join", "Right Join"]);
        foreach ($context['_seq'] as $context["_key"] => $context["bloc"]) {
            // line 132
            yield "                    <li class=\"p-2 hover:bg-purple-200 rounded-md cursor-pointer\" draggable=\"true\" ondragstart=\"handleDragStart(event)\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["bloc"], "html", null, true);
            yield "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['bloc'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 134
        yield "            </ul>
        </div>
    </div>
</body>
</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "vueJeu.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  251 => 134,  242 => 132,  238 => 131,  230 => 125,  224 => 121,  222 => 120,  211 => 111,  206 => 108,  204 => 107,  200 => 105,  193 => 103,  184 => 101,  180 => 100,  177 => 99,  173 => 98,  168 => 95,  159 => 93,  155 => 92,  150 => 89,  148 => 88,  133 => 75,  128 => 72,  119 => 70,  115 => 69,  110 => 66,  108 => 65,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>SQLUEDO - Page Jeu</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <script>
        function handleDragStart(event) {
            event.dataTransfer.setData(\"text/plain\", event.target.innerText);
        }

        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDrop(event) {
            event.preventDefault();
            const data = event.dataTransfer.getData(\"text/plain\");
            const textarea = document.querySelector('textarea[name=\"requete_sql\"]');
            textarea.value += data + \" \";
        }

        function clearForm(oForm) {
            oForm.reset();
            for (let element of oForm.elements) {
                switch (element.type.toLowerCase()) {
                    case \"text\":
                    case \"password\":
                    case \"textarea\":
                    case \"hidden\":
                        element.value = \"\";
                        break;
                    case \"radio\":
                    case \"checkbox\":
                        element.checked = false;
                        break;
                    case \"select-one\":
                    case \"select-multi\":
                        element.selectedIndex = -1;
                        break;
                }
            }
        }
    </script>
</head>
<body class=\"bg-gray-50 m-10 min-h-screen\">
    <nav class=\"text-black py-4\">
        <div class=\"container mx-auto flex justify-between items-center\">
            <div class=\"flex items-center\">
                <a href=\"/SQLuedo/src/templates/documentationSQL.html\" target=\"_blank\" class=\"return-link\"><img src=\"/SQLuedo/src/images/documentationpng.png\" alt=\"documentation\" class=\"m-4\"></a>
                <a href=\"/SQLuedo/src/\" class=\"return-link\"><img src=\"/SQLuedo/src/images/retour.png\" alt=\"retour\" class=\"m-4\"></a>
            </div>
            <div class=\"flex items-center\">
                <!-- <a href=\"#\" class=\"return-link\"><img src=\"/SQLuedo/src/images/basedonneepng.png\" alt=\"bdd\" class=\"m-4\"></a> -->
                <!-- <a href=\"#\" class=\"return-link\"><img src=\"/SQLuedo/src/images/indice.png\" alt=\"indice\" class=\"m-4\"></a> -->
                <!-- <a href=\"#\" class=\"return-link\"><img src=\"/SQLuedo/src/images/connexion_petit.png\" alt=\"connexion\" class=\"m-4\"></a> -->
            </div>
        </div>
    </nav>

    <div class=\"container mx-auto flex mt-8\">
        <div class=\"w-3/4 p-4\">
            <!-- Affichage des erreurs -->
                {% if dVueErreur is defined and dVueErreur|length > 0 %}
                <div class=\"bg-red-100 text-red-800 p-4 rounded-lg mb-4\">
                    <h2>Attention !</h2>
                    <ul>
                        {% for erreur in dVueErreur %}
                            <li>{{ erreur }}</li>
                        {% endfor %}
                    </ul>
                </div>
            {% endif %}

            <!-- Formulaire de requête SQL -->
            <form method=\"post\" action=\"ValidationJeuFormulaireExecution\" name=\"formulaireSQL\" class=\"mb-4\">
                <label class=\"block text-gray-700 text-lg font-bold mb-2\">Requêtes SQL</label>
                <textarea name=\"requete_sql\" class=\"w-full h-48 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600\" placeholder=\"Écrivez votre requête SQL ici...\" ondragover=\"handleDragOver(event)\" ondrop=\"handleDrop(event)\"></textarea>
                <button type=\"submit\" class=\"mt-2 bg-black text-white px-4 py-2 rounded-lg\">Valider</button>
            </form>

            <!-- Tableau de réponse -->
            <div class=\"mb-4\">
                <label class=\"block text-gray-700 text-lg font-bold mb-2\">Tableau de réponse</label>
                <div class=\"w-full border border-gray-300 rounded-lg p-4\">
                    <!-- Affichage des résultats -->
                    {% if dVue.resultats is not empty %}
                        <table class=\"table-auto w-full\">
                            <thead>
                                <tr>
                                    {% for column in dVue.resultats[0]|keys %}
                                        <th class=\"px-4 py-2\">{{ column }}</th>
                                    {% endfor %}
                                </tr>
                            </thead>
                            <tbody>
                                {% for row in dVue.resultats %}
                                    <tr>
                                        {% for cell in row %}
                                            <td class=\"border px-4 py-2\">{{ cell }}</td>
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
            <form method=\"post\" action=\"ValidationJeuFormulaireVerifier\" name=\"formulaireReponse\" class=\"flex items-center\">
                <input type=\"text\" name=\"reponse_utilisateur\" id=\"responseField\" class=\"w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600\" placeholder=\"Réponse\">
                <button type=\"submit\" class=\"ml-4 bg-black text-white px-6 py-3 rounded-lg\">Valider</button>
                <button type=\"button\" class=\"ml-4 bg-gray-300 text-black px-6 py-3 rounded-lg\" onclick=\"clearForm(document.formulaireReponse)\">Effacer</button>
            </form>
            {% if dVueVerif is defined %}
            <div class=\"bg-red-100 text-red-800 p-4 rounded-lg mb-4 \">
                <p>Reponce Incorrecte.</p>
            </div>
            {% endif %}
        </div>


        <!-- Liste des blocs SQL drag & drop -->
        <div class=\"w-1/4 p-4 bg-purple-100 rounded-lg\">
            <ul class=\"space-y-2 text-gray-800 font-medium\">
                {% for bloc in [\"Select\", \"Where\", \"From\", \"Join\", \"On\", \"And\", \"Order By\", \"Group By\", \"Having\", \"Full Join\", \"Left Join\", \"Right Join\"] %}
                    <li class=\"p-2 hover:bg-purple-200 rounded-md cursor-pointer\" draggable=\"true\" ondragstart=\"handleDragStart(event)\">{{ bloc }}</li>
                {% endfor %}
            </ul>
        </div>
    </div>
</body>
</html>
", "vueJeu.html", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\vueJeu.html");
    }
}
