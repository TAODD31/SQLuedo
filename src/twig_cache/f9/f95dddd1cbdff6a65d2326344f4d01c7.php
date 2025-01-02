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

/* test.html.twig */
class __TwigTemplate_437bc0e6916549ccaf312a3e80d569de extends Template
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
            'title' => [$this, 'block_title'],
            'navAcceuil' => [$this, 'block_navAcceuil'],
            'content' => [$this, 'block_content'],
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
    <title>";
        // line 6
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-100 text-gray-900\">
    <header class=\"bg-gray-100 text-white py-4\">
        ";
        // line 11
        yield from $this->unwrap()->yieldBlock('navAcceuil', $context, $blocks);
        // line 16
        yield "    </header>
    <main class=\"container mx-auto p-8\">
        ";
        // line 18
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 21
        yield "    </main>
</body>
</html>
";
        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Titre par défaut";
        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navAcceuil(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 12
        yield "        <nav>
            <p class=\" text-center\">Bloc par défaut du parent (navAcceuil).</p>
        </nav>
        ";
        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 19
        yield "        <p>Contenu par défaut du parent.</p>
        ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "test.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  109 => 19,  102 => 18,  94 => 12,  87 => 11,  76 => 6,  68 => 21,  66 => 18,  62 => 16,  60 => 11,  52 => 6,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Titre par défaut{% endblock %}</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-100 text-gray-900\">
    <header class=\"bg-gray-100 text-white py-4\">
        {% block navAcceuil %}
        <nav>
            <p class=\" text-center\">Bloc par défaut du parent (navAcceuil).</p>
        </nav>
        {% endblock %}
    </header>
    <main class=\"container mx-auto p-8\">
        {% block content %}
        <p>Contenu par défaut du parent.</p>
        {% endblock %}
    </main>
</body>
</html>
", "test.html.twig", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\test.html.twig");
    }
}
