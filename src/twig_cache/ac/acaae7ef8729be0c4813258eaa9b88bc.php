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

/* creerGroupe.html */
class __TwigTemplate_2b1c251185826b4447356d70f0c06ab5 extends Template
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
    <title>Créer un groupe</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-200 w-screen h-screen flex flex-col\">
<div class=\"h-1/6 flex justify-between items-center p-10\">
    <a class=\"w-15\" href=\"/SQLuedo/src/index/pageGroupe\"><img src=\"/SQLuedo/src/images/retour.png\"/></a>
</div>
<div class=\"h-5/6 flex items-center justify-center\">
    <div class=\"w-1/2 bg-gray-300 rounded-xl p-8\">
        <form method=\"POST\" action=\"/SQLuedo/src/index/CreerGroupe\" class=\"space-y-6\">
            <div class=\"flex flex-col\">
                <label for=\"nom\" class=\"font-medium mb-2\">Nom du groupe</label>
                <input type=\"text\" id=\"nom\" name=\"nom\" class=\"h-10 w-full text-black bg-gray-100 rounded-full px-4 font-medium text-center\"/>
                ";
        // line 18
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "nom", [], "any", true, true, false, 18)) {
            // line 19
            yield "                <p class=\"text-red-800\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "nom", [], "any", false, false, false, 19), "html", null, true);
            yield "</p>
                ";
        }
        // line 21
        yield "            </div>

            <div class=\"flex flex-col mt-4\">
                <label for=\"code\" class=\"font-medium mb-2\">Code du groupe</label>
                <input type=\"text\" id=\"code\" name=\"code\" class=\"h-10 w-full text-black bg-gray-100 rounded-full px-4 font-medium text-center\"/>
                ";
        // line 26
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "code", [], "any", true, true, false, 26)) {
            // line 27
            yield "                <p class=\"text-red-800\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "code", [], "any", false, false, false, 27), "html", null, true);
            yield "</p>
                ";
        }
        // line 29
        yield "            </div>

            <div class=\"flex justify-center mt-6\">
                <input type=\"submit\" name=\"act\" value=\"Créer le groupe\" class=\"px-6 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 focus:outline-none\">
            </div>
        </form>
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
        return "creerGroupe.html";
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
        return array (  84 => 29,  78 => 27,  76 => 26,  69 => 21,  63 => 19,  61 => 18,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Créer un groupe</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-200 w-screen h-screen flex flex-col\">
<div class=\"h-1/6 flex justify-between items-center p-10\">
    <a class=\"w-15\" href=\"/SQLuedo/src/index/pageGroupe\"><img src=\"/SQLuedo/src/images/retour.png\"/></a>
</div>
<div class=\"h-5/6 flex items-center justify-center\">
    <div class=\"w-1/2 bg-gray-300 rounded-xl p-8\">
        <form method=\"POST\" action=\"/SQLuedo/src/index/CreerGroupe\" class=\"space-y-6\">
            <div class=\"flex flex-col\">
                <label for=\"nom\" class=\"font-medium mb-2\">Nom du groupe</label>
                <input type=\"text\" id=\"nom\" name=\"nom\" class=\"h-10 w-full text-black bg-gray-100 rounded-full px-4 font-medium text-center\"/>
                {% if dVueErreur.nom is defined %}
                <p class=\"text-red-800\">{{ dVueErreur.nom }}</p>
                {% endif %}
            </div>

            <div class=\"flex flex-col mt-4\">
                <label for=\"code\" class=\"font-medium mb-2\">Code du groupe</label>
                <input type=\"text\" id=\"code\" name=\"code\" class=\"h-10 w-full text-black bg-gray-100 rounded-full px-4 font-medium text-center\"/>
                {% if dVueErreur.code is defined %}
                <p class=\"text-red-800\">{{ dVueErreur.code }}</p>
                {% endif %}
            </div>

            <div class=\"flex justify-center mt-6\">
                <input type=\"submit\" name=\"act\" value=\"Créer le groupe\" class=\"px-6 py-2 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 focus:outline-none\">
            </div>
        </form>
    </div>
</div>
</body>
</html>
", "creerGroupe.html", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\creerGroupe.html");
    }
}
