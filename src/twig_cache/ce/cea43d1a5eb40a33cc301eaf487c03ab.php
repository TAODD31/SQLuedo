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

/* connexionProfil.html */
class __TwigTemplate_cdc09a4a52ab7dc0b363acd16a8570b4 extends Template
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
        yield "<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>SQLUEDO - Connexion</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <!-- <style>
        .background-image {
            background-image: url('images/image.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style> -->
</head>
<body class=\"background-image h-screen bg-gray-900 bg-opacity-70\">
<a href=\"/SQLuedo/src/\" class=\"return-link\">
    <img src=\"/SQLuedo/src/images/retour.png\" alt=\"Retour\" class=\"ml-10\">
</a>
<div class=\"flex items-center justify-center h-screen\">
    <div class=\"w-1/3 h-auto px-6 mx-auto bg-gray-400 p-6 rounded-lg shadow-lg bg-opacity-50\">
        <div class=\"text-center\">
            <img class=\" mx-auto\" src=\"/SQLuedo/src/images/logoconnexion.png\" alt=\"Logo connexion\">
        </div>
        ";
        // line 25
        if ((array_key_exists("dVueErreur", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["dVueErreur"] ?? null)) > 0))) {
            // line 26
            yield "        <div class=\"bg-red-100 text-red-800 p-4 rounded-lg mb-4\">
            <h2>Attention !</h2>
            <ul>
                ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["dVueErreur"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["erreur"]) {
                // line 30
                yield "                <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["erreur"], "html", null, true);
                yield "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['erreur'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "            </ul>
        </div>
        ";
        }
        // line 35
        yield "        <div class=\"mt-8\">

            <form method=\"POST\" action=\"/SQLuedo/src/index/VerifInfosConnexion\">
                <div>
                    <input type=\"text\" name=\"username\" id=\"username\" placeholder=\"Nom\" required class=\"block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40\" />
                </div>
                <div class=\"mt-8\">
                    <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Mot de passe\" required class=\"block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40\" />
                </div>
                <div class=\"mt-12 flex justify-between\">
                    <a href=\"/SQLuedo/src/index/PageInscription\" class=\"w-auto px-4 py-2 tracking-wide text-white bg-gray-900 rounded-lg hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50\">
                        Nouveau Compte
                    </a>
                    <input type=\"submit\" value=\"Se Connecter\" class=\"w-auto px-4 py-2 tracking-wide text-white bg-gray-900 rounded-lg hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50\">
                    <input type=\"hidden\" name=\"action\" value=\"VerifInfosConnexion\">
                </div>
            </form>
        </div>
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
        return "connexionProfil.html";
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
        return array (  93 => 35,  88 => 32,  79 => 30,  75 => 29,  70 => 26,  68 => 25,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>SQLUEDO - Connexion</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <!-- <style>
        .background-image {
            background-image: url('images/image.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style> -->
</head>
<body class=\"background-image h-screen bg-gray-900 bg-opacity-70\">
<a href=\"/SQLuedo/src/\" class=\"return-link\">
    <img src=\"/SQLuedo/src/images/retour.png\" alt=\"Retour\" class=\"ml-10\">
</a>
<div class=\"flex items-center justify-center h-screen\">
    <div class=\"w-1/3 h-auto px-6 mx-auto bg-gray-400 p-6 rounded-lg shadow-lg bg-opacity-50\">
        <div class=\"text-center\">
            <img class=\" mx-auto\" src=\"/SQLuedo/src/images/logoconnexion.png\" alt=\"Logo connexion\">
        </div>
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
        <div class=\"mt-8\">

            <form method=\"POST\" action=\"/SQLuedo/src/index/VerifInfosConnexion\">
                <div>
                    <input type=\"text\" name=\"username\" id=\"username\" placeholder=\"Nom\" required class=\"block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40\" />
                </div>
                <div class=\"mt-8\">
                    <input type=\"password\" name=\"password\" id=\"password\" placeholder=\"Mot de passe\" required class=\"block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40\" />
                </div>
                <div class=\"mt-12 flex justify-between\">
                    <a href=\"/SQLuedo/src/index/PageInscription\" class=\"w-auto px-4 py-2 tracking-wide text-white bg-gray-900 rounded-lg hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50\">
                        Nouveau Compte
                    </a>
                    <input type=\"submit\" value=\"Se Connecter\" class=\"w-auto px-4 py-2 tracking-wide text-white bg-gray-900 rounded-lg hover:bg-gray-400 focus:bg-gray-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50\">
                    <input type=\"hidden\" name=\"action\" value=\"VerifInfosConnexion\">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
", "connexionProfil.html", "D:\\wamp\\www\\SQLuedo\\src\\templates\\connexionProfil.html");
    }
}
