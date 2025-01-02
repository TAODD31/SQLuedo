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

/* profil.html */
class __TwigTemplate_de5a0d39166b043514604686df5d2456 extends Template
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
        yield "
<!DOCTYPE html>
<html lang=\"fr\" xmlns=\"http://www.w3.org/1999/html\">
<head>
    <meta charset=\"UTF-8\">
    <title>Groupe</title>
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>
<body class=\"bg-gray-200 w-screen h-screen\">
<div class=\"h-1/6  flex justify-between items-center p-10\">
    <a class=\"w-15\" href=\"/SQLuedo/src/index/default\"><img src=\"/SQLuedo/src/images/retour.png\" alt=\"Retour\"/></a>
    <a class=\"w-15\" href=\"/SQLuedo/src/index/deconnection\"><img src=\"/SQLuedo/src/images/deconnexion.png\" alt=\"Se déconnecter\"/></a>
</div>

<div class=\"h-3/6 border flex justify-center \">
    <div class=\"border w-3/5 flex flex-col text-center \">
        <div class=\"h-1/2 text-align-center flex flex-col items-center\">
            <a class=\"h-1/3 w-1/5 font-medium flex items-center justify-center\">Nom</a>
            <p class=\"h-1/4 w-1/3 text-black bg-gray-100 rounded-full font-medium flex items-center justify-center\">";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["nom"] ?? null), "html", null, true);
        yield "</p>
        </div>
        ";
        // line 21
        if ((($context["groupe"] ?? null) != null)) {
            // line 22
            yield "        <div class=\"h-1/2 text-align-center flex flex-col items-center\">
            <a class=\"h-1/3 w-1/5 font-medium flex items-center justify-center\">Nom du groupe</a>
            <a class=\"h-1/4 w-1/3 text-black bg-gray-100 rounded-full font-medium flex items-center justify-center\">";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["groupe"] ?? null), "html", null, true);
            yield "</a>
        </div>
        <div class=\"h-1/2 text-align-center flex flex-col items-center\">
            <a class=\"h-1/3 w-1/5 font-medium flex items-center justify-center\">Code de groupe</a>
            <a class=\"h-1/4 w-1/3 text-black bg-gray-100 rounded-full font-medium flex items-center justify-center\">";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["codeGroupe"] ?? null), "html", null, true);
            yield "</a>
        </div>
        ";
        }
        // line 31
        yield "    </div>
    <div class=\" w-2/5 flex flex-col items-center \">
        <a class=\"h-1/5 font-medium flex items-center justify-center\">Statistiques du profil</a>
        <div class=\"h-3/5 flex flex-col items-center justify-center\">
            <img src=\"../images/reussite.png\" alt=\"\"/>
            <div class =\"p-3 flex flex-col items-center rounded-2xl bg-gray-100\">
                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["statistiques"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["stat"]) {
            // line 38
            yield "                <div class=\"flex flex-col justify-start\">
                    <a><u>Enquete numéro :";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stat"], "titre", [], "any", false, false, false, 39), "html", null, true);
            yield " </u> <u><br>Nombres de tentative : ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stat"], "nbTentatives", [], "any", false, false, false, 39), "html", null, true);
            yield "</u> <u> <br>Nombres de réussite : ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stat"], "reussi", [], "any", false, false, false, 39), "html", null, true);
            yield " </u></a>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['stat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        yield "            </div>
        </div>

    </div>
</div>

<div class=\"h-1/6 border flex justify-center\">
    <div class=\"flex border justify-between items-center w-2/3\">

        <input type=\"checkbox\" id=\"ouvrirPopup\" class=\"hidden peer\">

        <label for=\"ouvrirPopup\" class=\"cursor-pointer flex justify-center items-center h-12 w-48 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400\">
            Quitter le groupe
        </label>

        <div class=\"peer-checked:flex fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center\">
            <div class=\"bg-white p-6 rounded-lg shadow-lg max-w-md w-full\">
                <p class=\"pb-5\">Êtes vous sur de vouloir quitter le groupe ?</p>
                <div class=\"flex justify-around\">
                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-gray-300 text-white px-4 py-2 rounded\">
                        Annuler
                    </label>
                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-red-500 text-white px-4 py-2 rounded\">
                        <a href=\"/SQLuedo/src/index/QuitterGroupe\"> Quitter le groupe </a>
                    </label>
                </div>


            </div>
        </div>

        ";
        // line 73
        if ((($context["groupe"] ?? null) == null)) {
            // line 74
            yield "            <a href=\"/SQLuedo/src/index/AffRejoindreGroupe\" class=\"flex justify-center items-center h-12 w-48 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 \">Rejoindre un groupe</a>
            <a href=\"/SQLuedo/src/index/AffCreationGroupe\" class=\"flex justify-center items-center h-12 w-48 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 \">Créer un groupe</a>
        ";
        }
        // line 77
        yield "
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
        return "profil.html";
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
        return array (  154 => 77,  149 => 74,  147 => 73,  114 => 42,  101 => 39,  98 => 38,  94 => 37,  86 => 31,  80 => 28,  73 => 24,  69 => 22,  67 => 21,  62 => 19,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
<!DOCTYPE html>
<html lang=\"fr\" xmlns=\"http://www.w3.org/1999/html\">
<head>
    <meta charset=\"UTF-8\">
    <title>Groupe</title>
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>
<body class=\"bg-gray-200 w-screen h-screen\">
<div class=\"h-1/6  flex justify-between items-center p-10\">
    <a class=\"w-15\" href=\"/SQLuedo/src/index/default\"><img src=\"/SQLuedo/src/images/retour.png\" alt=\"Retour\"/></a>
    <a class=\"w-15\" href=\"/SQLuedo/src/index/deconnection\"><img src=\"/SQLuedo/src/images/deconnexion.png\" alt=\"Se déconnecter\"/></a>
</div>

<div class=\"h-3/6 border flex justify-center \">
    <div class=\"border w-3/5 flex flex-col text-center \">
        <div class=\"h-1/2 text-align-center flex flex-col items-center\">
            <a class=\"h-1/3 w-1/5 font-medium flex items-center justify-center\">Nom</a>
            <p class=\"h-1/4 w-1/3 text-black bg-gray-100 rounded-full font-medium flex items-center justify-center\">{{ nom }}</p>
        </div>
        {% if groupe != NULL %}
        <div class=\"h-1/2 text-align-center flex flex-col items-center\">
            <a class=\"h-1/3 w-1/5 font-medium flex items-center justify-center\">Nom du groupe</a>
            <a class=\"h-1/4 w-1/3 text-black bg-gray-100 rounded-full font-medium flex items-center justify-center\">{{ groupe }}</a>
        </div>
        <div class=\"h-1/2 text-align-center flex flex-col items-center\">
            <a class=\"h-1/3 w-1/5 font-medium flex items-center justify-center\">Code de groupe</a>
            <a class=\"h-1/4 w-1/3 text-black bg-gray-100 rounded-full font-medium flex items-center justify-center\">{{ codeGroupe }}</a>
        </div>
        {% endif %}
    </div>
    <div class=\" w-2/5 flex flex-col items-center \">
        <a class=\"h-1/5 font-medium flex items-center justify-center\">Statistiques du profil</a>
        <div class=\"h-3/5 flex flex-col items-center justify-center\">
            <img src=\"../images/reussite.png\" alt=\"\"/>
            <div class =\"p-3 flex flex-col items-center rounded-2xl bg-gray-100\">
                {% for stat in statistiques %}
                <div class=\"flex flex-col justify-start\">
                    <a><u>Enquete numéro :{{ stat.titre }} </u> <u><br>Nombres de tentative : {{ stat.nbTentatives }}</u> <u> <br>Nombres de réussite : {{ stat.reussi }} </u></a>
                </div>
                {% endfor %}
            </div>
        </div>

    </div>
</div>

<div class=\"h-1/6 border flex justify-center\">
    <div class=\"flex border justify-between items-center w-2/3\">

        <input type=\"checkbox\" id=\"ouvrirPopup\" class=\"hidden peer\">

        <label for=\"ouvrirPopup\" class=\"cursor-pointer flex justify-center items-center h-12 w-48 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400\">
            Quitter le groupe
        </label>

        <div class=\"peer-checked:flex fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center\">
            <div class=\"bg-white p-6 rounded-lg shadow-lg max-w-md w-full\">
                <p class=\"pb-5\">Êtes vous sur de vouloir quitter le groupe ?</p>
                <div class=\"flex justify-around\">
                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-gray-300 text-white px-4 py-2 rounded\">
                        Annuler
                    </label>
                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-red-500 text-white px-4 py-2 rounded\">
                        <a href=\"/SQLuedo/src/index/QuitterGroupe\"> Quitter le groupe </a>
                    </label>
                </div>


            </div>
        </div>

        {% if groupe == NULL %}
            <a href=\"/SQLuedo/src/index/AffRejoindreGroupe\" class=\"flex justify-center items-center h-12 w-48 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 \">Rejoindre un groupe</a>
            <a href=\"/SQLuedo/src/index/AffCreationGroupe\" class=\"flex justify-center items-center h-12 w-48 text-sm font-medium text-white focus:outline-none bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 \">Créer un groupe</a>
        {% endif %}

    </div>
</div>


</body>
</html>
", "profil.html", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\profil.html");
    }
}
