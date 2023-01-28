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

/* themes/au/templates/block/block--servicesauxcitoyens-2.html.twig */
class __TwigTemplate_085437857289bc564a19ece4e1143667c3c920bbf3472a7950c5ded1cbe3d7b6 extends \Twig\Template
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
        echo "<div class=\"wrap\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_services", [], "any", false, false, true, 2));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            // line 3
            echo "                            
    ";
            // line 4
            $context["titre"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = $context["value"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#paragraph"] ?? null) : null), "field_titre", [], "any", false, false, true, 4), "getValue", [], "method", false, false, true, 4);
            // line 5
            echo "    ";
            $context["bg"] = twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = $context["value"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["#paragraph"] ?? null) : null), "field_image", [], "any", false, false, true, 5);
            // line 6
            echo "    ";
            $context["lien"] = twig_get_attribute($this->env, $this->source, (($__internal_compile_2 = $context["value"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["#paragraph"] ?? null) : null), "field_lien", [], "any", false, false, true, 6);
            // line 7
            echo "    ";
            if (($context["key"] >= "0")) {
                // line 8
                echo "    <div class=\"card\">
        <div class=\"card-pic-wrap bg-ser-";
                // line 9
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 9, $this->source), "html", null, true);
                echo "\">
            <img src=\"";
                // line 10
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["bg"] ?? null), "entity", [], "any", false, false, true, 10), "uri", [], "any", false, false, true, 10), "value", [], "any", false, false, true, 10), 10, $this->source)), "html", null, true);
                echo "\" alt=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["titre"] ?? null), 0, [], "any", false, false, true, 10), "value", [], "any", false, false, true, 10), 10, $this->source))), "html", null, true);
                echo "\">
        </div>
        <div class=\"card-content\">
          <h3>";
                // line 13
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["titre"] ?? null), 0, [], "any", false, false, true, 13), "value", [], "any", false, false, true, 13), 13, $this->source))), "html", null, true);
                echo "</h3>
          <p>
          ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["lien"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["link_service"]) {
                    // line 16
                    echo "          <a class=\"link\" href=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["link_service"], "url", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
                    echo "\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["link_service"], "title", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
                    echo "</a>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link_service'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 18
                echo "        </p>
        </div>
    </div>
    ";
            }
            // line 22
            echo "
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
  </div>
  
";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/block/block--servicesauxcitoyens-2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 24,  101 => 22,  95 => 18,  84 => 16,  80 => 15,  75 => 13,  67 => 10,  63 => 9,  60 => 8,  57 => 7,  54 => 6,  51 => 5,  49 => 4,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"wrap\">
    {% for key, value in content.field_services %}
                            
    {% set titre = value['#paragraph'].field_titre.getValue()  %}
    {% set bg = value['#paragraph'].field_image  %}
    {% set lien = value['#paragraph'].field_lien  %}
    {% if key >= '0'   %}
    <div class=\"card\">
        <div class=\"card-pic-wrap bg-ser-{{key}}\">
            <img src=\"{{file_url(bg.entity.uri.value)}}\" alt=\"{{titre.0.value|render|striptags }}\">
        </div>
        <div class=\"card-content\">
          <h3>{{titre.0.value|render|striptags }}</h3>
          <p>
          {% for link_service in lien %}
          <a class=\"link\" href=\"{{link_service.url}}\">{{link_service.title}}</a>
          {% endfor %}
        </p>
        </div>
    </div>
    {% endif %}

                            {% endfor %}

  </div>
  
", "themes/au/templates/block/block--servicesauxcitoyens-2.html.twig", "/opt/drupal/web/themes/au/templates/block/block--servicesauxcitoyens-2.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 2, "set" => 4, "if" => 7);
        static $filters = array("escape" => 9, "striptags" => 10, "render" => 10);
        static $functions = array("file_url" => 10);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape', 'striptags', 'render'],
                ['file_url']
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
