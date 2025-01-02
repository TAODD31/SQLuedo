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

/* creationEnquete.html */
class __TwigTemplate_c99362843d3f32bb984fd5fcef4c0d4c extends Template
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
    <title>Créer une enquête</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>


<body class=\"bg-gray-100 min-h-screen w-full\">
    <div class=\"h-1/6 flex justify-between items-center p-10\">
        <a class=\"w-15\" href=\"/SQLuedo/src\"><img src=\"/SQLuedo/src/images/retour.png\"/></a>
    </div>
    <div class=\"w-full flex items-center justify-center\">

        <form class=\"w-full max-w-4xl p-8 bg-white rounded-lg shadow-md space-y-8\"  method=\"POST\" action=\"creationEnquete\" >
            ";
        // line 19
        if ((array_key_exists("dVueErreur", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["dVueErreur"] ?? null)) > 0))) {
            // line 20
            yield "            <div class=\"bg-red-100 text-red-800 p-4 rounded-lg mb-4\">
                <h2>Attention !</h2>
                <ul>
                    ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["dVueErreur"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["erreur"]) {
                // line 24
                yield "                    <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["erreur"], "html", null, true);
                yield "</li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['erreur'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            yield "                </ul>
            </div>
            ";
        }
        // line 29
        yield "            <div>
                <label for=\"title\" class=\"block text-lg font-semibold mb-2\">Titre de l'enquête</label>
                <input id=\"title\" name=\"title\" type=\"text\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
            </div>
            <div>
                <label for=\"example-sql\" class=\"block text-lg font-semibold mb-2\">Exemple d'instruction SQL</label>
                <div class=\"p-3 bg-gray-100 border border-gray-300 rounded-lg text-sm font-mono whitespace-pre-wrap\">
                    CREATE DATABASE GestionEvenements; -- Le nom de la base de données correspond au contexte.<br>
                    USE GestionEvenements; <br><br>
                    
                    -- Table Evenement<br>
                    CREATE TABLE Evenement (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;nom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;description TEXT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;date_evenement DATE NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;lieu VARCHAR(255) NOT NULL<br>
                    );<br><br>
                    
                    -- Table Participant<br>
                    CREATE TABLE Participant (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;nom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;prenom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;email VARCHAR(255) UNIQUE NOT NULL<br>
                    );<br><br>
                    
                    -- Table Inscription<br>
                    CREATE TABLE Inscription (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;evenement_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;participant_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;date_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;statut ENUM('Confirmée', 'En attente', 'Annulée') DEFAULT 'En attente',<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (participant_id) REFERENCES Participant(id) ON DELETE CASCADE<br>
                    );<br><br>
                    
                    -- Table Feedback<br>
                    CREATE TABLE Feedback (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;evenement_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;participant_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;commentaire TEXT,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;note INT CHECK (note BETWEEN 1 AND 5),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;date_feedback DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (participant_id) REFERENCES Participant(id) ON DELETE CASCADE<br>
                    );<br><br>
                    
                    -- Table Ressource<br>
                    CREATE TABLE Ressource (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;evenement_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;nom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;type ENUM('Matériel', 'Humain', 'Financier') NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;description TEXT,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE<br>
                    );<br><br>
                    
                    -- Insérer des données dans les tables<br>
                    
                    -- Table Evenement<br>
                    INSERT INTO Evenement (nom, description, date_evenement, lieu)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Conférence IA', 'Une conférence sur l\\'intelligence artificielle et ses applications.', '2024-12-01', 'Paris'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Hackathon Développement Durable', 'Un hackathon axé sur les solutions pour un avenir durable.', '2024-11-25', 'Lyon');<br><br>
                    
                    -- Table Participant<br>
                    INSERT INTO Participant (nom, prenom, email)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Dupont', 'Jean', 'jean.dupont@example.com'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Martin', 'Sophie', 'sophie.martin@example.com'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Durand', 'Paul', 'paul.durand@example.com');<br><br>
                    
                    -- Table Inscription<br>
                    INSERT INTO Inscription (evenement_id, participant_id, statut)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 1, 'Confirmée'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 2, 'En attente'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(2, 3, 'Confirmée');<br><br>
                    
                    -- Table Feedback<br>
                    INSERT INTO Feedback (evenement_id, participant_id, commentaire, note)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 1, 'Excellente conférence, très instructive.', 5),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 2, 'Bonne organisation mais manque de pauses.', 4);<br><br>
                    
                    -- Table Ressource<br>
                    INSERT INTO Ressource (evenement_id, nom, type, description)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 'Projecteur', 'Matériel', 'Projecteur utilisé pour les présentations.'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(2, 'Sponsor financier', 'Financier', 'Apport de 5000€ pour les prix du hackathon.');<br>
                    </div>

            <div>
                <label for=\"sql-command\" class=\"block text-lg font-semibold mb-2\">Commande SQL</label>
                <textarea id=\"sql-command\" name=\"sql_command\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\"></textarea>
            </div>

            <div>
                <label for=\"description\" class=\"block text-lg font-semibold mb-2\">Description (histoire de l'enquête)</label>
                <textarea id=\"description\" name=\"description\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\"></textarea>
            </div>

            <div>
                <label for=\"image\" class=\"block text-lg font-semibold mb-2\">Image associée à l'enquête</label>
                <input id=\"image\" name=\"image\" type=\"file\" accept=\"image/*\" class=\"w-full border border-gray-300 rounded-lg p-3 bg-gray-100\">
            </div>

            <div>
                <label for=\"response\" class=\"block text-lg font-semibold mb-2\">Réponse de l'enquête</label>
                <input id=\"response\" name=\"response\" type=\"text\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
            </div>

            <div>
                <label for=\"hint\" class=\"block text-lg font-semibold mb-2\">Indice</label>
                <textarea id=\"hint\" name=\"hint\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\"></textarea>
            </div>

            <div>
                <p class=\"text-lg font-semibold mb-4\">Nombre de coups</p>
                <div class=\"space-y-4\">
                    <div class=\"flex items-center\">
                        <label for=\"expert\" class=\"text-gray-700 mr-4\">Niveau Expert</label>
                        <input id=\"expert\" name=\"expert_attempts\" type=\"number\" min=\"1\" step=\"1\" required class=\"w-20 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
                    </div>
                    <div class=\"flex items-center\">
                        <label for=\"intermediate\" class=\"text-gray-700 mr-4\">Niveau Intermédiaire</label>
                        <input id=\"intermediate\" name=\"intermediate_attempts\" type=\"number\" min=\"1\" step=\"1\" required class=\"w-20 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
                    </div>
                </div>
            </div>
            
            <div class=\"text-center\">
                <button type=\"submit\" class=\"bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400\">
                    Créer l'enquête
                </button>
            </div>
        </form>
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
        return "creationEnquete.html";
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
        return array (  87 => 29,  82 => 26,  73 => 24,  69 => 23,  64 => 20,  62 => 19,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Créer une enquête</title>
    <link href=\"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css\" rel=\"stylesheet\">
    <script src=\"https://cdn.tailwindcss.com\"></script>
</head>


<body class=\"bg-gray-100 min-h-screen w-full\">
    <div class=\"h-1/6 flex justify-between items-center p-10\">
        <a class=\"w-15\" href=\"/SQLuedo/src\"><img src=\"/SQLuedo/src/images/retour.png\"/></a>
    </div>
    <div class=\"w-full flex items-center justify-center\">

        <form class=\"w-full max-w-4xl p-8 bg-white rounded-lg shadow-md space-y-8\"  method=\"POST\" action=\"creationEnquete\" >
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
            <div>
                <label for=\"title\" class=\"block text-lg font-semibold mb-2\">Titre de l'enquête</label>
                <input id=\"title\" name=\"title\" type=\"text\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
            </div>
            <div>
                <label for=\"example-sql\" class=\"block text-lg font-semibold mb-2\">Exemple d'instruction SQL</label>
                <div class=\"p-3 bg-gray-100 border border-gray-300 rounded-lg text-sm font-mono whitespace-pre-wrap\">
                    CREATE DATABASE GestionEvenements; -- Le nom de la base de données correspond au contexte.<br>
                    USE GestionEvenements; <br><br>
                    
                    -- Table Evenement<br>
                    CREATE TABLE Evenement (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;nom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;description TEXT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;date_evenement DATE NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;lieu VARCHAR(255) NOT NULL<br>
                    );<br><br>
                    
                    -- Table Participant<br>
                    CREATE TABLE Participant (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;nom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;prenom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;email VARCHAR(255) UNIQUE NOT NULL<br>
                    );<br><br>
                    
                    -- Table Inscription<br>
                    CREATE TABLE Inscription (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;evenement_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;participant_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;date_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;statut ENUM('Confirmée', 'En attente', 'Annulée') DEFAULT 'En attente',<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (participant_id) REFERENCES Participant(id) ON DELETE CASCADE<br>
                    );<br><br>
                    
                    -- Table Feedback<br>
                    CREATE TABLE Feedback (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;evenement_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;participant_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;commentaire TEXT,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;note INT CHECK (note BETWEEN 1 AND 5),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;date_feedback DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (participant_id) REFERENCES Participant(id) ON DELETE CASCADE<br>
                    );<br><br>
                    
                    -- Table Ressource<br>
                    CREATE TABLE Ressource (<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;id INT AUTO_INCREMENT PRIMARY KEY,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;evenement_id INT NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;nom VARCHAR(255) NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;type ENUM('Matériel', 'Humain', 'Financier') NOT NULL,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;description TEXT,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;FOREIGN KEY (evenement_id) REFERENCES Evenement(id) ON DELETE CASCADE<br>
                    );<br><br>
                    
                    -- Insérer des données dans les tables<br>
                    
                    -- Table Evenement<br>
                    INSERT INTO Evenement (nom, description, date_evenement, lieu)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Conférence IA', 'Une conférence sur l\\'intelligence artificielle et ses applications.', '2024-12-01', 'Paris'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Hackathon Développement Durable', 'Un hackathon axé sur les solutions pour un avenir durable.', '2024-11-25', 'Lyon');<br><br>
                    
                    -- Table Participant<br>
                    INSERT INTO Participant (nom, prenom, email)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Dupont', 'Jean', 'jean.dupont@example.com'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Martin', 'Sophie', 'sophie.martin@example.com'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;('Durand', 'Paul', 'paul.durand@example.com');<br><br>
                    
                    -- Table Inscription<br>
                    INSERT INTO Inscription (evenement_id, participant_id, statut)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 1, 'Confirmée'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 2, 'En attente'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(2, 3, 'Confirmée');<br><br>
                    
                    -- Table Feedback<br>
                    INSERT INTO Feedback (evenement_id, participant_id, commentaire, note)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 1, 'Excellente conférence, très instructive.', 5),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 2, 'Bonne organisation mais manque de pauses.', 4);<br><br>
                    
                    -- Table Ressource<br>
                    INSERT INTO Ressource (evenement_id, nom, type, description)<br>
                    VALUES<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(1, 'Projecteur', 'Matériel', 'Projecteur utilisé pour les présentations.'),<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;(2, 'Sponsor financier', 'Financier', 'Apport de 5000€ pour les prix du hackathon.');<br>
                    </div>

            <div>
                <label for=\"sql-command\" class=\"block text-lg font-semibold mb-2\">Commande SQL</label>
                <textarea id=\"sql-command\" name=\"sql_command\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\"></textarea>
            </div>

            <div>
                <label for=\"description\" class=\"block text-lg font-semibold mb-2\">Description (histoire de l'enquête)</label>
                <textarea id=\"description\" name=\"description\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\"></textarea>
            </div>

            <div>
                <label for=\"image\" class=\"block text-lg font-semibold mb-2\">Image associée à l'enquête</label>
                <input id=\"image\" name=\"image\" type=\"file\" accept=\"image/*\" class=\"w-full border border-gray-300 rounded-lg p-3 bg-gray-100\">
            </div>

            <div>
                <label for=\"response\" class=\"block text-lg font-semibold mb-2\">Réponse de l'enquête</label>
                <input id=\"response\" name=\"response\" type=\"text\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
            </div>

            <div>
                <label for=\"hint\" class=\"block text-lg font-semibold mb-2\">Indice</label>
                <textarea id=\"hint\" name=\"hint\"  class=\"w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\"></textarea>
            </div>

            <div>
                <p class=\"text-lg font-semibold mb-4\">Nombre de coups</p>
                <div class=\"space-y-4\">
                    <div class=\"flex items-center\">
                        <label for=\"expert\" class=\"text-gray-700 mr-4\">Niveau Expert</label>
                        <input id=\"expert\" name=\"expert_attempts\" type=\"number\" min=\"1\" step=\"1\" required class=\"w-20 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
                    </div>
                    <div class=\"flex items-center\">
                        <label for=\"intermediate\" class=\"text-gray-700 mr-4\">Niveau Intermédiaire</label>
                        <input id=\"intermediate\" name=\"intermediate_attempts\" type=\"number\" min=\"1\" step=\"1\" required class=\"w-20 p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500\">
                    </div>
                </div>
            </div>
            
            <div class=\"text-center\">
                <button type=\"submit\" class=\"bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400\">
                    Créer l'enquête
                </button>
            </div>
        </form>
    </div>
</body>
</html>
", "creationEnquete.html", "A:\\wamp64\\www\\SQLuedo\\src\\templates\\creationEnquete.html");
    }
}
