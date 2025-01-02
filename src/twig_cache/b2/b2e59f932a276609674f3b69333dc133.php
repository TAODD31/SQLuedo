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
class __TwigTemplate_ee399e991e18b8c15f07bf83d086c84d extends Template
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
            'navAcceuil' => [$this, 'block_navAcceuil'],
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
        yield "Accueil SQLuedo";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navAcceuil(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<nav class=\"bg-gray-100 text-white \">
    <div class=\"container mx-auto flex justify-between items-center\">
        ";
        // line 8
        if ((($context["session"] ?? null) == "admin")) {
            // line 9
            yield "            <a href=\"/SQLuedo/src/admin/afficherCreation\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/ajout_admin.png\" alt=\"documentation admin\" class=\"ml-10 w-12\">
            </a>
            <a href=\"/SQLuedo/src/index/pageConnexionProfil\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/connexion_petit.png\" alt=\"connexion moyen\" class=\"mr-10\">
            </a>
        ";
        } else {
            // line 16
            yield "            <a href=\"/SQLuedo/src/templates/documentationSQL.html\" target=\"_blank\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/documentationpng.png\" alt=\"documentation\" class=\"ml-10\">
            </a>
            <a href=\"/SQLuedo/src/index/pageConnexionProfil\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/connexion_petit.png\" alt=\"connexion petit\" class=\"mr-10\">
            </a>
        ";
        }
        // line 23
        yield "    </div>
</nav>
";
        yield from [];
    }

    // line 28
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 29
        yield "<div class=\"bg-gray-100 min-h-screen\">
    <div class=\"text-center m-20\">
        <h1 class=\"text-4xl font-black text-gray-900 dark:text-white\">SQLUEDO</h1>
    </div>
    <div class=\"grid grid-cols-4 md:grid-cols-3 gap-32 justify-items-center\">
        ";
        // line 34
        if ((($context["session"] ?? null) == "admin")) {
            // line 35
            yield "
            ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["enquetes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["enquete"]) {
                // line 37
                yield "                <div class=\"w-3/4 p-6 bg-white border-2 border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-900\">
                    <div class=\"flex items-center\">
                        <a href=\"/SQLuedo/src/index/";
                // line 39
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "id", [], "any", false, false, false, 39), "html", null, true);
                yield "/vueJeu\" class=\"flex-grow\">
                            <h5 class=\"mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white\">
                                ";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "titre", [], "any", false, false, false, 41), "html", null, true);
                yield "
                            </h5>
                        </a>

                        <input type=\"checkbox\" id=\"ouvrirPopup\" class=\"hidden peer\">

                        <!-- Image qui ouvre le popup -->
                        <label for=\"ouvrirPopup\" class=\"cursor-pointer\">
                            <img src=\"/SQLuedo/src/images/interdit.png\" alt=\"interdit\" class=\"w-8 h-8\">
                        </label>

                        <!-- Popup -->
                        <div class=\"peer-checked:flex fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center\">
                            <div class=\"bg-white p-6 rounded-lg shadow-lg max-w-md w-full\">
                                <p class=\"pb-5\">Êtes-vous sûr de vouloir supprimer l'enquête ?</p>
                                <div class=\"flex justify-around\">
                                    <!-- Bouton Annuler -->
                                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-gray-300 text-white px-4 py-2 rounded\">
                                        Annuler
                                    </label>
                                    <!-- Bouton Supprimer -->
                                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-red-500 text-white px-4 py-2 rounded\">
                                        <a href=\"/SQLuedo/src/index/supprimerEnquete\"> Supprimer l'enquête </a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class=\"mb-3 font-normal text-justify text-gray-700 dark:text-gray-400\">";
                // line 69
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "description", [], "any", false, false, false, 69), "html", null, true);
                yield "</p>
                    <div class=\"flex-grow text-center\">
                        <a href=\"/SQLuedo/src/index/";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "id", [], "any", false, false, false, 71), "html", null, true);
                yield "/vueJeu\" class=\"inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">
                            Lire plus
                        </a>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['enquete'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            yield "
        ";
        } else {
            // line 79
            yield "
            ";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["enquetes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["enquete"]) {
                // line 81
                yield "                <div class=\"w-3/4 p-6 bg-white border-2 border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-900\">
                    <div class=\"flex items-center\">
                        <a href=\"/SQLuedo/src/index/";
                // line 83
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "id", [], "any", false, false, false, 83), "html", null, true);
                yield "/vueJeu\" class=\"flex-grow\">
                            <h5 class=\"mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white\">
                                ";
                // line 85
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "titre", [], "any", false, false, false, 85), "html", null, true);
                yield "
                            </h5>
                        </a>
                    </div>
                    <p class=\"mb-3 font-normal text-justify text-gray-700 dark:text-gray-400\">";
                // line 89
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "description", [], "any", false, false, false, 89), "html", null, true);
                yield "</p>
                    <div class=\"flex-grow text-center\">
                        <a href=\"/SQLuedo/src/index/";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["enquete"], "id", [], "any", false, false, false, 91), "html", null, true);
                yield "/vueJeu\" class=\"inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">
                            Lire plus
                        </a>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['enquete'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            yield "
        ";
        }
        // line 99
        yield "
    </div>
</div>
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
        return array (  230 => 99,  226 => 97,  214 => 91,  209 => 89,  202 => 85,  197 => 83,  193 => 81,  189 => 80,  186 => 79,  182 => 77,  170 => 71,  165 => 69,  134 => 41,  129 => 39,  125 => 37,  121 => 36,  118 => 35,  116 => 34,  109 => 29,  102 => 28,  95 => 23,  86 => 16,  77 => 9,  75 => 8,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'test.html.twig' %}

{% block title %}Accueil SQLuedo{% endblock %}

{% block navAcceuil %}
<nav class=\"bg-gray-100 text-white \">
    <div class=\"container mx-auto flex justify-between items-center\">
        {% if session == 'admin' %}
            <a href=\"/SQLuedo/src/admin/afficherCreation\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/ajout_admin.png\" alt=\"documentation admin\" class=\"ml-10 w-12\">
            </a>
            <a href=\"/SQLuedo/src/index/pageConnexionProfil\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/connexion_petit.png\" alt=\"connexion moyen\" class=\"mr-10\">
            </a>
        {% else %}
            <a href=\"/SQLuedo/src/templates/documentationSQL.html\" target=\"_blank\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/documentationpng.png\" alt=\"documentation\" class=\"ml-10\">
            </a>
            <a href=\"/SQLuedo/src/index/pageConnexionProfil\" class=\"return-link\">
                <img src=\"/SQLuedo/src/images/connexion_petit.png\" alt=\"connexion petit\" class=\"mr-10\">
            </a>
        {% endif %}
    </div>
</nav>
{% endblock %}


{% block content %}
<div class=\"bg-gray-100 min-h-screen\">
    <div class=\"text-center m-20\">
        <h1 class=\"text-4xl font-black text-gray-900 dark:text-white\">SQLUEDO</h1>
    </div>
    <div class=\"grid grid-cols-4 md:grid-cols-3 gap-32 justify-items-center\">
        {% if session == 'admin' %}

            {% for enquete in enquetes %}
                <div class=\"w-3/4 p-6 bg-white border-2 border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-900\">
                    <div class=\"flex items-center\">
                        <a href=\"/SQLuedo/src/index/{{ enquete.id }}/vueJeu\" class=\"flex-grow\">
                            <h5 class=\"mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white\">
                                {{ enquete.titre }}
                            </h5>
                        </a>

                        <input type=\"checkbox\" id=\"ouvrirPopup\" class=\"hidden peer\">

                        <!-- Image qui ouvre le popup -->
                        <label for=\"ouvrirPopup\" class=\"cursor-pointer\">
                            <img src=\"/SQLuedo/src/images/interdit.png\" alt=\"interdit\" class=\"w-8 h-8\">
                        </label>

                        <!-- Popup -->
                        <div class=\"peer-checked:flex fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center\">
                            <div class=\"bg-white p-6 rounded-lg shadow-lg max-w-md w-full\">
                                <p class=\"pb-5\">Êtes-vous sûr de vouloir supprimer l'enquête ?</p>
                                <div class=\"flex justify-around\">
                                    <!-- Bouton Annuler -->
                                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-gray-300 text-white px-4 py-2 rounded\">
                                        Annuler
                                    </label>
                                    <!-- Bouton Supprimer -->
                                    <label for=\"ouvrirPopup\" class=\"cursor-pointer bg-red-500 text-white px-4 py-2 rounded\">
                                        <a href=\"/SQLuedo/src/index/supprimerEnquete\"> Supprimer l'enquête </a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class=\"mb-3 font-normal text-justify text-gray-700 dark:text-gray-400\">{{ enquete.description }}</p>
                    <div class=\"flex-grow text-center\">
                        <a href=\"/SQLuedo/src/index/{{ enquete.id }}/vueJeu\" class=\"inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">
                            Lire plus
                        </a>
                    </div>
                </div>
            {% endfor %}

        {% else %}

            {% for enquete in enquetes %}
                <div class=\"w-3/4 p-6 bg-white border-2 border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-900\">
                    <div class=\"flex items-center\">
                        <a href=\"/SQLuedo/src/index/{{ enquete.id }}/vueJeu\" class=\"flex-grow\">
                            <h5 class=\"mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white\">
                                {{ enquete.titre }}
                            </h5>
                        </a>
                    </div>
                    <p class=\"mb-3 font-normal text-justify text-gray-700 dark:text-gray-400\">{{ enquete.description }}</p>
                    <div class=\"flex-grow text-center\">
                        <a href=\"/SQLuedo/src/index/{{ enquete.id }}/vueJeu\" class=\"inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">
                            Lire plus
                        </a>
                    </div>
                </div>
            {% endfor %}

        {% endif %}

    </div>
</div>
{% endblock %}
", "accueil.html", "C:\\wamp64\\www\\SQLuedo\\src\\templates\\accueil.html");
    }
}
