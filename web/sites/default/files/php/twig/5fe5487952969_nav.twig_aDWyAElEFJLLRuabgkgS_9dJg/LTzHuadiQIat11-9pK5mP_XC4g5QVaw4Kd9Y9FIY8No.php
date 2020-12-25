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

/* @bootstrap_storybook/nav/nav.twig */
class __TwigTemplate_2d3faed4458f32d655a216a12847c8b3bde1cd3cbe9032d17580ef0e827415ea extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'items' => [$this, 'block_items'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 14
        echo "
";
        // line 15
        if ((($context["alignment"] ?? null) == "right")) {
            // line 16
            echo "  ";
            $context["alignment"] = "justify-content-end";
        } elseif ((        // line 17
($context["alignment"] ?? null) == "center")) {
            // line 18
            echo "  ";
            $context["alignment"] = "justify-content-center";
        } elseif ((        // line 19
($context["alignment"] ?? null) == "vertical")) {
            // line 20
            echo "  ";
            $context["alignment"] = "flex-column";
        } else {
            // line 22
            echo "  ";
            $context["alignment"] = "";
        }
        // line 24
        echo "
";
        // line 25
        $context["style"] = ((($context["style"] ?? null)) ? (("nav-" . $this->sandbox->ensureToStringAllowed(($context["style"] ?? null), 25, $this->source))) : (""));
        // line 26
        $context["fill"] = ((($context["fill"] ?? null)) ? (("nav-" . $this->sandbox->ensureToStringAllowed(($context["fill"] ?? null), 26, $this->source))) : (""));
        // line 27
        echo "
";
        // line 28
        $context["nav_classes"] = twig_array_merge([0 => "nav", 1 => ($context["style"] ?? null), 2 => ($context["alignment"] ?? null), 3 => ($context["fill"] ?? null)], ((($context["utility_classes"] ?? null)) ? (($context["utility_classes"] ?? null)) : ([])));
        // line 29
        echo "
";
        // line 30
        if (($context["items"] ?? null)) {
            // line 31
            echo "  <ul";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["nav_classes"] ?? null)], "method", false, false, true, 31), 31, $this->source), "html", null, true);
            echo ">
    ";
            // line 32
            $this->displayBlock('items', $context, $blocks);
            // line 59
            echo "  </ul>
";
        }
    }

    // line 32
    public function block_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 34
            echo "        ";
            $context["nav_item_classes"] = [0 => "nav-item", 1 => ((twig_get_attribute($this->env, $this->source,             // line 36
$context["item"], "in_active_trail", [], "any", false, false, true, 36)) ? ("active") : ("")), 2 => (((twig_get_attribute($this->env, $this->source,             // line 37
$context["item"], "is_expanded", [], "any", false, false, true, 37) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 37))) ? ("dropdown") : (""))];
            // line 39
            echo "        ";
            $context["nav_link_classes"] = [0 => "nav-link"];
            // line 40
            echo "        ";
            if (twig_test_iterable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 40), "options", [], "any", false, false, true, 40), "attributes", [], "any", false, false, true, 40), "class", [], "any", false, false, true, 40))) {
                // line 41
                echo "          ";
                $context["nav_link_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["nav_link_classes"] ?? null), 41, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 41), "options", [], "any", false, false, true, 41), "attributes", [], "any", false, false, true, 41), "class", [], "any", false, false, true, 41), 41, $this->source));
                // line 42
                echo "        ";
            } elseif (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 42), "options", [], "any", false, false, true, 42), "attributes", [], "any", false, false, true, 42), "class", [], "any", false, false, true, 42)) {
                // line 43
                echo "          ";
                $context["nav_link_classes"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["nav_link_classes"] ?? null), 43, $this->source), [0 => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 43), "options", [], "any", false, false, true, 43), "attributes", [], "any", false, false, true, 43), "class", [], "any", false, false, true, 43)]);
                // line 44
                echo "        ";
            }
            // line 45
            echo "        <li class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(($context["nav_item_classes"] ?? null), 45, $this->source), " "), "html", null, true);
            echo "\">
          ";
            // line 46
            if ((twig_get_attribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 46) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 46))) {
                // line 47
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 47), 47, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 47), 47, $this->source), ["class" => twig_array_merge($this->sandbox->ensureToStringAllowed(($context["nav_link_classes"] ?? null), 47, $this->source), [0 => "dropdown-toggle"]), "data-toggle" => "dropdown"]), "html", null, true);
                echo "
            ";
                // line 48
                if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 48)) {
                    // line 49
                    echo "              ";
                    $this->loadTemplate("@bootstrap_storybook/dropdown/dropdown-menu.twig", "@bootstrap_storybook/nav/nav.twig", 49)->display(twig_array_merge($context, ["items" => twig_get_attribute($this->env, $this->source,                     // line 50
$context["item"], "below", [], "any", false, false, true, 50)]));
                    // line 52
                    echo "            ";
                }
                // line 53
                echo "          ";
            } else {
                // line 54
                echo "            ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 54), 54, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 54), 54, $this->source), ["class" => ($context["nav_link_classes"] ?? null)]), "html", null, true);
                echo "
          ";
            }
            // line 56
            echo "        </li>
      ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/nav/nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 58,  170 => 56,  164 => 54,  161 => 53,  158 => 52,  156 => 50,  154 => 49,  152 => 48,  147 => 47,  145 => 46,  140 => 45,  137 => 44,  134 => 43,  131 => 42,  128 => 41,  125 => 40,  122 => 39,  120 => 37,  119 => 36,  117 => 34,  99 => 33,  95 => 32,  89 => 59,  87 => 32,  82 => 31,  80 => 30,  77 => 29,  75 => 28,  72 => 27,  70 => 26,  68 => 25,  65 => 24,  61 => 22,  57 => 20,  55 => 19,  52 => 18,  50 => 17,  47 => 16,  45 => 15,  42 => 14,  40 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/nav/nav.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/nav/nav.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 13, "if" => 15, "set" => 16, "block" => 32, "for" => 33, "include" => 49);
        static $filters = array("merge" => 28, "escape" => 31, "join" => 45);
        static $functions = array("link" => 47);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'if', 'set', 'block', 'for', 'include'],
                ['merge', 'escape', 'join'],
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
