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

/* resultatjeu.html */
class __TwigTemplate_085d627b05cf92a29bda446dd6c3a4c9 extends Template
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
    <title>Félicitations</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-50 min-h-screen flex items-center justify-center\">
    <!-- Contenu principal centré -->
    <div class=\"text-center\">
        <!-- Bouton de retour -->
        <div class=\"absolute top-4 left-4\">
            <a href=\"/SQLuedo/src\" class=\"return-link\"><img src=\"/SQLuedo/src/images/retour.png\" alt=\"retour\" class=\"m-4\"></a>

        </div>

        <!-- Message de félicitations -->
        <h1 class=\"text-5xl font-bold mb-12\">Bravo vous avez gagné</h1>

        <!-- Cartes de statistiques -->
        <div class=\"flex justify-between space-x-16\">
            <!-- Carte Temps Réalisé
            <div class=\"bg-white border border-gray-200 rounded-lg p-6 text-center shadow-md w-48\">
                <div class=\"text-gray-500 mb-2\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-8 w-8 mx-auto\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z\" />
                    </svg>
                </div>
                <p class=\"text-2xl font-semibold\">8 min 57</p>
                <p class=\"text-gray-600\">Temps réalisé</p>
            </div> -->

            <!-- Carte Niveau de difficulté -->
            <!-- <div class=\"bg-white border border-gray-200 rounded-lg p-6 text-center shadow-md w-48\">
                <div class=\"text-gray-500 mb-2\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-8 w-8 mx-auto\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16-10h-4m4 0V7m0 4l-4-4m0 0L12 4m4 0h4\" />
                    </svg>
                </div>
                <p class=\"text-2xl font-semibold\">Expert</p>
                <p class=\"text-gray-600\">Nombre de coups</p>
            </div> -->
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
        return "resultatjeu.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Félicitations</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
</head>
<body class=\"bg-gray-50 min-h-screen flex items-center justify-center\">
    <!-- Contenu principal centré -->
    <div class=\"text-center\">
        <!-- Bouton de retour -->
        <div class=\"absolute top-4 left-4\">
            <a href=\"/SQLuedo/src\" class=\"return-link\"><img src=\"/SQLuedo/src/images/retour.png\" alt=\"retour\" class=\"m-4\"></a>

        </div>

        <!-- Message de félicitations -->
        <h1 class=\"text-5xl font-bold mb-12\">Bravo vous avez gagné</h1>

        <!-- Cartes de statistiques -->
        <div class=\"flex justify-between space-x-16\">
            <!-- Carte Temps Réalisé
            <div class=\"bg-white border border-gray-200 rounded-lg p-6 text-center shadow-md w-48\">
                <div class=\"text-gray-500 mb-2\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-8 w-8 mx-auto\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z\" />
                    </svg>
                </div>
                <p class=\"text-2xl font-semibold\">8 min 57</p>
                <p class=\"text-gray-600\">Temps réalisé</p>
            </div> -->

            <!-- Carte Niveau de difficulté -->
            <!-- <div class=\"bg-white border border-gray-200 rounded-lg p-6 text-center shadow-md w-48\">
                <div class=\"text-gray-500 mb-2\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-8 w-8 mx-auto\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                        <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m16-10h-4m4 0V7m0 4l-4-4m0 0L12 4m4 0h4\" />
                    </svg>
                </div>
                <p class=\"text-2xl font-semibold\">Expert</p>
                <p class=\"text-gray-600\">Nombre de coups</p>
            </div> -->
        </div>
    </div>
</body>
</html>
", "resultatjeu.html", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\resultatjeu.html");
    }
}
