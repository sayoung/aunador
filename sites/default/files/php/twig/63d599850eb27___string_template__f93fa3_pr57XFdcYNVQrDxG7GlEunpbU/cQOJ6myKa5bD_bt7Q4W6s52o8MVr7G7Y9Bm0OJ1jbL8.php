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

/* __string_template__f93fa38eb11491ebb570162a9c199441b7776eb7dc2ab3909ab4596bd743811d */
class __TwigTemplate_531d24abfeb8e48ef081c1d6628df9792aec92a776c4f64397a228d9accd7aa1 extends \Twig\Template
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
        if ((($context["field_form__status"] ?? null) == "open")) {
            echo "<a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_node"] ?? null), 1, $this->source), "html", null, true);
            echo "\"><img class=\"tpdfsize\" src=\"http://aust.ma/themes/gavias_castron/images/next.png\"></a> ";
        }
        // line 2
        if ((($context["field_form__status"] ?? null) == "closed")) {
            echo "  l'offre est terminée ";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__f93fa38eb11491ebb570162a9c199441b7776eb7dc2ab3909ab4596bd743811d";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{# inline_template_start #}{% if field_form__status == 'open'  %}<a href=\"{{ view_node }}\"><img class=\"tpdfsize\" src=\"http://aust.ma/themes/gavias_castron/images/next.png\"></a> {% endif %}
{% if field_form__status == 'closed' %}  l'offre est terminée {% endif %}", "__string_template__f93fa38eb11491ebb570162a9c199441b7776eb7dc2ab3909ab4596bd743811d", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1);
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
