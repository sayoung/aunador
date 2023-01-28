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

/* themes/au/templates/region/region--menu-user.html.twig */
class __TwigTemplate_592c4afda7370a9dbb3d6eb93a68adcf86e7788b7cbbd8e9275c732dea2ae9f4 extends \Twig\Template
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
        // line 15
        echo "    ";
        // line 16
        $context["classes"] = [0 => "region", 1 => ("region-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 18
($context["region"] ?? null), 18, $this->source)))];
        // line 21
        echo "    ";
        if (($context["content"] ?? null)) {
            // line 22
            echo "
        ";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 23, $this->source), "html", null, true);
            echo "

    ";
        }
        // line 26
        echo "    ";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/region/region--menu-user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 26,  50 => 23,  47 => 22,  44 => 21,  42 => 18,  41 => 16,  39 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{#
    /**
     * @file
     * Theme override to display a region.
     *
     * Available variables:
     * - content: The content for this region, typically blocks.
     * - attributes: HTML attributes for the region <div>.
     * - region: The name of the region variable as defined in the theme's
     *   .info.yml file.
     * 
     * @see template_preprocess_region()
     */
    #}
    {%
      set classes = [
        'region',
        'region-' ~ region|clean_class,
      ]
    %}
    {% if content %}

        {{ content }}

    {% endif %}
    ", "themes/au/templates/region/region--menu-user.html.twig", "/opt/drupal/web/themes/au/templates/region/region--menu-user.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16, "if" => 21);
        static $filters = array("clean_class" => 18, "escape" => 23);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
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
