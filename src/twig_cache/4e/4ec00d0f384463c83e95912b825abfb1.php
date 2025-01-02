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

/* rejoindreGroupe.html */
class __TwigTemplate_9190376cd61d7da62e22b4e82861a605 extends Template
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
    <title>Rejoindre un groupe</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-200 w-screen h-screen flex flex-col\">
<div class=\"h-1/6 flex justify-between items-center p-10\">
    <a class=\"w-15\" href=\"/SQLuedo/src/index/pageGroupe\"><img src=\"/SQLuedo/src/images/retour.png\" /></a>
</div>
<div class=\"h-5/6 flex items-center justify-center\">
    <div class=\"w-1/2 bg-gray-300 rounded-xl p-8 flex flex-col items-center space-y-6\">
        <form method=\"POST\" action=\"/SQLuedo/src/index/RejoindreGroupe\" class=\"w-full flex flex-col items-center space-y-4\">
            ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "dejaDansGroupe", [], "any", true, true, false, 15)) {
            // line 16
            yield "            <p class=\"text-red-800\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "dejaDansGroupe", [], "any", false, false, false, 16), "html", null, true);
            yield "</p>
            ";
        }
        // line 18
        yield "            <label for=\"nomGroupe\" class=\"font-medium\">Nom du groupe</label>
            <input type=\"text\" id=\"nomGroupe\" name=\"nomGroupe\" class=\"h-10 w-3/4 text-black bg-gray-100 rounded-full px-4 font-medium text-center\" />
            ";
        // line 20
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "groupeExistant", [], "any", true, true, false, 20)) {
            // line 21
            yield "            <p class=\"text-red-800\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "groupeExistant", [], "any", false, false, false, 21), "html", null, true);
            yield "</p>
            ";
        }
        // line 23
        yield "            <label for=\"codeGroupe\" class=\"font-medium\">Code du groupe</label>
            <input type=\"text\" id=\"codeGroupe\" name=\"codeGroupe\" class=\"h-10 w-3/4 text-black bg-gray-100 rounded-full px-4 font-medium text-center\" />
            ";
        // line 25
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "code", [], "any", true, true, false, 25)) {
            // line 26
            yield "            <p class=\"text-red-800\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dVueErreur"] ?? null), "code", [], "any", false, false, false, 26), "html", null, true);
            yield "</p>
            ";
        }
        // line 28
        yield "
        <button type=\"submit\" class=\"h-12 w-48 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 focus:outline-none\">
            Rejoindre le groupe
        </button>
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
        return "rejoindreGroupe.html";
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
        return array (  90 => 28,  84 => 26,  82 => 25,  78 => 23,  72 => 21,  70 => 20,  66 => 18,  60 => 16,  58 => 15,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Rejoindre un groupe</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-200 w-screen h-screen flex flex-col\">
<div class=\"h-1/6 flex justify-between items-center p-10\">
    <a class=\"w-15\" href=\"/SQLuedo/src/index/pageGroupe\"><img src=\"/SQLuedo/src/images/retour.png\" /></a>
</div>
<div class=\"h-5/6 flex items-center justify-center\">
    <div class=\"w-1/2 bg-gray-300 rounded-xl p-8 flex flex-col items-center space-y-6\">
        <form method=\"POST\" action=\"/SQLuedo/src/index/RejoindreGroupe\" class=\"w-full flex flex-col items-center space-y-4\">
            {% if dVueErreur.dejaDansGroupe is defined %}
            <p class=\"text-red-800\">{{ dVueErreur.dejaDansGroupe }}</p>
            {% endif %}
            <label for=\"nomGroupe\" class=\"font-medium\">Nom du groupe</label>
            <input type=\"text\" id=\"nomGroupe\" name=\"nomGroupe\" class=\"h-10 w-3/4 text-black bg-gray-100 rounded-full px-4 font-medium text-center\" />
            {% if dVueErreur.groupeExistant is defined %}
            <p class=\"text-red-800\">{{ dVueErreur.groupeExistant }}</p>
            {% endif %}
            <label for=\"codeGroupe\" class=\"font-medium\">Code du groupe</label>
            <input type=\"text\" id=\"codeGroupe\" name=\"codeGroupe\" class=\"h-10 w-3/4 text-black bg-gray-100 rounded-full px-4 font-medium text-center\" />
            {% if dVueErreur.code is defined %}
            <p class=\"text-red-800\">{{ dVueErreur.code }}</p>
            {% endif %}

        <button type=\"submit\" class=\"h-12 w-48 text-sm font-medium text-white bg-gray-700 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-gray-400 focus:outline-none\">
            Rejoindre le groupe
        </button>
        </form>
    </div>
</div>
</body>
</html>
", "rejoindreGroupe.html", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\rejoindreGroupe.html");
    }
}
