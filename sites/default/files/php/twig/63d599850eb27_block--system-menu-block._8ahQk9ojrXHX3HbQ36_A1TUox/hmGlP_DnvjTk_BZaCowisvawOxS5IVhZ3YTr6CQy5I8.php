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

/* themes/au/templates/block/block--system-menu-block.html.twig */
class __TwigTemplate_21ac9091e301d3565ef45b990f65da06ca64472767f23d20cd8c1e50817abdd7 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@classy/block/block--system-menu-block.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        $context["show_anchor"] = ("show-" . \Drupal\Component\Utility\Html::getId($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 10), 10, $this->source)));
        // line 11
        $context["hide_anchor"] = ("hide-" . \Drupal\Component\Utility\Html::getId($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "id", [], "any", false, false, true, 11), 11, $this->source)));
        // line 1
        $this->parent = $this->loadTemplate("@classy/block/block--system-menu-block.html.twig", "themes/au/templates/block/block--system-menu-block.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 13, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/block/block--system-menu-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 13,  53 => 12,  48 => 1,  46 => 11,  44 => 10,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"@classy/block/block--system-menu-block.html.twig\" %}
{#
/**
 * @file
 * Bartik's theme implementation for a menu block.
 *
 * @ingroup themeable
 */
#}
{% set show_anchor = \"show-\" ~ attributes.id|clean_id %}
{% set hide_anchor = \"hide-\" ~ attributes.id|clean_id %}
{% block content %}
{{ content }}
{% endblock %}
", "themes/au/templates/block/block--system-menu-block.html.twig", "/opt/drupal/web/themes/au/templates/block/block--system-menu-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 10);
        static $filters = array("clean_id" => 10, "escape" => 13);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['clean_id', 'escape'],
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
