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

/* accueil.html */
class __TwigTemplate_319d08f11dd7a7f597c748bbb8f459f0 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "test.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("test.html.twig", "accueil.html", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Accueil - SQLUEDO";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "    <div class=\"text-center m-20\">
        <h1 class=\"text-4xl font-black text-gray-900 dark:text-white\">SQLUEDO</h1>
    </div>
<div class=\"grid grid-cols-4 md:grid-cols-3 gap-32 justify-items-center\">
    ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["enquetes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["enquete"]) {
            // line 11
            yield "    <div class=\"w-3/4 p-6 bg-white border-2 border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-900\">
        <a href=\"#\">
            <h5 class=\"mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white\">";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "titre", [], "any", false, false, false, 13), "html", null, true);
            yield "</h5>
        </a>
        <p class=\"mb-3 font-normal text-justify text-gray-700 dark:text-gray-400\">";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "description", [], "any", false, false, false, 15), "html", null, true);
            yield "</p>
        <div class=\"flex-grow text-center\">
            <a href=\"/SQLuedo/src/jeu/";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "id", [], "any", false, false, false, 17), "html", null, true);
            yield "/Reinit\"
               class=\"inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">
                Lire plus
            </a>
        </div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['enquete'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        yield "</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "accueil.html";
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
        return array (  107 => 24,  94 => 17,  89 => 15,  84 => 13,  80 => 11,  76 => 10,  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Accueil - SQLUEDO{% endblock %}

{% block content %}
    <div class=\"text-center m-20\">
        <h1 class=\"text-4xl font-black text-gray-900 dark:text-white\">SQLUEDO</h1>
    </div>
<div class=\"grid grid-cols-4 md:grid-cols-3 gap-32 justify-items-center\">
    {% for enquete in enquetes %}
    <div class=\"w-3/4 p-6 bg-white border-2 border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-900\">
        <a href=\"#\">
            <h5 class=\"mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white\">{{ enquete.titre }}</h5>
        </a>
        <p class=\"mb-3 font-normal text-justify text-gray-700 dark:text-gray-400\">{{ enquete.description }}</p>
        <div class=\"flex-grow text-center\">
            <a href=\"/SQLuedo/src/jeu/{{enquete.id}}/Reinit\"
               class=\"inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">
                Lire plus
            </a>
        </div>
    </div>
    {% endfor %}
</div>
{% endblock %}
", "accueil.html", "A:\\wamp64\\www\\SQLuedo\\src\\templates\\accueil.html");
    }
}
