<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/au/templates/page/page.html.twig */
class __TwigTemplate_566bb6c2ed6d1e21d6d6fb646e8f0aebd373e0fd965c4226ae9ac819d2eb4ddc extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<body>
    <div id=\"wrapper\">
        ";
        // line 3
        $this->loadTemplate((($context["directory"] ?? null) . "/templates/extra/header.html.twig"), "themes/au/templates/page/page.html.twig", 3)->display($context);
        // line 4
        echo "        <main id=\"main\" role=\"main\" class=\"py-5 bg-light\">
            
                <div class=\"container\">
                    <div class=\"row\">
                            <div class=\"col-md-4 sideba\">
                               
                          ";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
        echo "
                            </div>
                        
                        <div class=\"col-md-8\">
\t\t\t                ";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
        echo "
                        </di>
                    </di>
                </di>
           
\t\t</main>
        ";
        // line 20
        $this->loadTemplate((($context["directory"] ?? null) . "/templates/extra/footer.html.twig"), "themes/au/templates/page/page.html.twig", 20)->display($context);
        // line 21
        echo "    </div>
</body>\t";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/page/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 21,  69 => 20,  60 => 14,  53 => 10,  45 => 4,  43 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<body>
    <div id=\"wrapper\">
        {% include directory ~ '/templates/extra/header.html.twig' %}
        <main id=\"main\" role=\"main\" class=\"py-5 bg-light\">
            
                <div class=\"container\">
                    <div class=\"row\">
                            <div class=\"col-md-4 sideba\">
                               
                          {{ page.sidebar }}
                            </div>
                        
                        <div class=\"col-md-8\">
\t\t\t                {{ page.content }}
                        </di>
                    </di>
                </di>
           
\t\t</main>
        {% include directory ~ '/templates/extra/footer.html.twig' %}
    </div>
</body>\t", "themes/au/templates/page/page.html.twig", "/opt/drupal/web/themes/au/templates/page/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 3);
        static $filters = array("escape" => 10);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
