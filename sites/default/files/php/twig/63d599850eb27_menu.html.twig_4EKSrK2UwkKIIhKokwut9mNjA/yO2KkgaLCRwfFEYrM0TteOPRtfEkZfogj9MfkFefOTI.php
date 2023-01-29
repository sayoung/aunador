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

/* themes/au/templates/navigation/menu.html.twig */
class __TwigTemplate_246a627163798de7c6c3f9373402362972dfbd3bcbe9d595202193f558c18167 extends \Twig\Template
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
        // line 21
        echo "


                    ";
        // line 24
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 25
        echo "                  ";
        // line 29
        echo "                  
                  ";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [($context["items"] ?? null), ($context["attributes"] ?? null), 0], 30, $context, $this->getSourceContext()));
        echo "
                  
                  ";
        // line 82
        echo "                                
                            
                            
                            
              
 





";
    }

    // line 32
    public function macro_menu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 33
            echo "                  
                    ";
            // line 34
            $macros["menus"] = $this;
            // line 35
            echo "                    
                    ";
            // line 36
            if (($context["items"] ?? null)) {
                // line 37
                echo "                    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 38
                    echo "                        <ul class=\"navigation clearfix\">
                        ";
                } elseif ((                // line 39
($context["menu_level"] ?? null) == 1)) {
                    // line 40
                    echo "                        <ul>
                      ";
                } else {
                    // line 42
                    echo "                      <ul>
                       ";
                }
                // line 44
                echo "                      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 45
                    echo "      ";
                    // line 46
                    $context["classes"] = [0 => "", 1 => ((twig_get_attribute($this->env, $this->source,                     // line 48
$context["item"], "is_expanded", [], "any", false, false, true, 48)) ? ("dropdown") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,                     // line 49
$context["item"], "is_collapsed", [], "any", false, false, true, 49)) ? ("dropdown") : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                     // line 50
$context["item"], "in_active_trail", [], "any", false, false, true, 50)) ? ("dropdown") : (""))];
                    // line 53
                    echo "      ";
                    // line 54
                    $context["classes_l_2"] = [0 => "", 1 => ((twig_get_attribute($this->env, $this->source,                     // line 56
$context["item"], "is_expanded", [], "any", false, false, true, 56)) ? ("dropdown") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,                     // line 57
$context["item"], "is_collapsed", [], "any", false, false, true, 57)) ? ("dropdown") : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                     // line 58
$context["item"], "in_active_trail", [], "any", false, false, true, 58)) ? ("dropdown") : (""))];
                    // line 61
                    echo "      ";
                    if ((($context["menu_level"] ?? null) == 0)) {
                        // line 62
                        echo "      <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 62), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 62), 62, $this->source), "html", null, true);
                        echo ">
        ";
                    } elseif ((                    // line 63
($context["menu_level"] ?? null) == 1)) {
                        // line 64
                        echo "        <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 64), "addClass", [0 => ($context["classes_l_2"] ?? null)], "method", false, false, true, 64), 64, $this->source), "html", null, true);
                        echo ">
        ";
                    } else {
                        // line 66
                        echo "        <li class=\"has-submenu parent-menu-item\" >
      ";
                    }
                    // line 68
                    echo "      

                            ";
                    // line 70
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 70), 70, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 70), 70, $this->source)), "html", null, true);
                    echo "
        ";
                    // line 71
                    if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 71)) {
                        // line 72
                        echo "          ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 72), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)], 72, $context, $this->getSourceContext()));
                        echo "
        ";
                    }
                    // line 74
                    echo "      </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 76
                echo "    </ul>

    
  ";
            }
            // line 80
            echo "      
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "themes/au/templates/navigation/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 80,  174 => 76,  167 => 74,  161 => 72,  159 => 71,  155 => 70,  151 => 68,  147 => 66,  141 => 64,  139 => 63,  134 => 62,  131 => 61,  129 => 58,  128 => 57,  127 => 56,  126 => 54,  124 => 53,  122 => 50,  121 => 49,  120 => 48,  119 => 46,  117 => 45,  112 => 44,  108 => 42,  104 => 40,  102 => 39,  99 => 38,  96 => 37,  94 => 36,  91 => 35,  89 => 34,  86 => 33,  71 => 32,  56 => 82,  51 => 30,  48 => 29,  46 => 25,  44 => 24,  39 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#
  /**
   * @file
   * Theme override to display a menu.
   *
   * Available variables:
   * - menu_name: The machine name of the menu.
   * - items: A nested list of menu items. Each menu item contains:
   *   - attributes: HTML attributes for the menu item.
   *   - below: The menu item child items.
   *   - title: The menu link title.
   *   - url: The menu link url, instance of \\Drupal\\Core\\Url
   *   - localized_options: Menu link localized options.
   *   - is_expanded: TRUE if the link has visible children within the current
   *     menu tree.
   *   - is_collapsed: TRUE if the link has children within the current menu tree
   *     that are not currently visible.
   *   - in_active_trail: TRUE if the link is in the active trail.
   */
  #}



                    {% import _self as menus %}
                  {#
                    We call a macro which calls itself to render the full tree.
                    @see https://twig.symfony.com/doc/1.x/tags/macro.html
                  #}
                  
                  {{ menus.menu_links(items, attributes, 0) }}
                  
                  {% macro menu_links(items, attributes, menu_level) %}
                  
                    {% import _self as menus %}
                    
                    {% if items %}
                    {% if menu_level == 0 %}
                        <ul class=\"navigation clearfix\">
                        {% elseif  menu_level == 1  %}
                        <ul>
                      {% else %}
                      <ul>
                       {% endif %}
                      {% for item in items %}
      {%
        set classes = [
          '',
          item.is_expanded ? 'dropdown',
          item.is_collapsed ? 'dropdown',
          item.in_active_trail ? 'dropdown',
        ]
      %}
      {%
        set classes_l_2 = [
        '',
        item.is_expanded ? 'dropdown',
          item.is_collapsed ? 'dropdown',
          item.in_active_trail ? 'dropdown',
        ]
      %}
      {% if menu_level == 0 %}
      <li{{ item.attributes.addClass(classes) }}>
        {% elseif  menu_level == 1  %}
        <li{{ item.attributes.addClass(classes_l_2) }}>
        {% else %}
        <li class=\"has-submenu parent-menu-item\" >
      {% endif %}
      

                            {{ link(item.title, item.url) }}
        {% if item.below %}
          {{ menus.menu_links(item.below, attributes, menu_level + 1) }}
        {% endif %}
      </li>
            {% endfor %}
    </ul>

    
  {% endif %}
      
{% endmacro %}
                                
                            
                            
                            
              
 





", "themes/au/templates/navigation/menu.html.twig", "/opt/drupal/web/themes/au/templates/navigation/menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 24, "macro" => 32, "if" => 36, "for" => 44, "set" => 46);
        static $filters = array("escape" => 62);
        static $functions = array("link" => 70);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                ['escape'],
                ['link']
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
