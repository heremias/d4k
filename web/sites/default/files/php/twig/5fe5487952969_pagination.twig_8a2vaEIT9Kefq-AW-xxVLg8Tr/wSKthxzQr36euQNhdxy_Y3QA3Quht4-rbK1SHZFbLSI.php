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

/* @bootstrap_storybook/pagination/pagination.twig */
class __TwigTemplate_bfb99a7369ec1f4201f871fe862f8967042de053f480d2a2b69495dda0bdf07a extends \Twig\Template
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
        // line 13
        echo "
";
        // line 14
        if ((($context["alignment"] ?? null) == "right")) {
            // line 15
            echo "  ";
            $context["alignment"] = "justify-content-end";
        } elseif ((        // line 16
($context["alignment"] ?? null) == "center")) {
            // line 17
            echo "  ";
            $context["alignment"] = "justify-content-center";
        } else {
            // line 19
            echo "  ";
            $context["alignment"] = "";
        }
        // line 21
        echo "
";
        // line 22
        if (($context["items"] ?? null)) {
            // line 23
            echo "  <nav class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 23, $this->source), " "), "html", null, true);
            echo "\" role=\"navigation\" aria-labelledby=\"pagination-heading\">
    <h4 id=\"pagination-heading\" class=\"visually-hidden\">";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination"));
            echo "</h4>
    <ul class=\"pagination pager__items js-pager__items ";
            // line 25
            ((($context["size"] ?? null)) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ("pagination-" . ($context["size"] ?? null)), "html", null, true))) : (print ("")));
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["alignment"] ?? null), 25, $this->source), "html", null, true);
            echo "\">
      ";
            // line 27
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 27)) {
                // line 28
                echo "        <li class=\"page-item pager__item pager__item--first\">
          <a href=\"";
                // line 29
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 29), "href", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to first page"));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 29), "attributes", [], "any", false, false, true, 29), 29, $this->source), "href", "title"), "html", null, true);
                echo " class=\"page-link\">
            <span class=\"visually-hidden\">";
                // line 30
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("First page"));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 31
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, true, true, 31), "text", [], "any", true, true, true, 31)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, true, true, 31), "text", [], "any", false, false, true, 31), 31, $this->source), t("« First"))) : (t("« First"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 35
            echo "      ";
            // line 36
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 36)) {
                // line 37
                echo "        <li class=\"page-item pager__item pager__item--previous\">
          <a href=\"";
                // line 38
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 38), "href", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page"));
                echo "\" rel=\"prev\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 38), "attributes", [], "any", false, false, true, 38), 38, $this->source), "href", "title", "rel"), "html", null, true);
                echo " class=\"page-link\">
            <span class=\"visually-hidden\">";
                // line 39
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page"));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 40
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 40), "text", [], "any", true, true, true, 40)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 40), "text", [], "any", false, false, true, 40), 40, $this->source), t("‹ Previous"))) : (t("‹ Previous"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 44
            echo "      ";
            // line 45
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["ellipses"] ?? null), "previous", [], "any", false, false, true, 45)) {
                // line 46
                echo "        <li class=\"page-item pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 48
            echo "      ";
            // line 49
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "pages", [], "any", false, false, true, 49));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 50
                echo "        <li class=\"page-item pager__item";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (" is-active active") : ("")));
                echo "\">
          ";
                // line 51
                if ((($context["current"] ?? null) == $context["key"])) {
                    // line 52
                    echo "            ";
                    $context["title"] = t("Current page");
                    // line 53
                    echo "          ";
                } else {
                    // line 54
                    echo "            ";
                    $context["title"] = t("Go to page @key", ["@key" => $context["key"]]);
                    // line 55
                    echo "          ";
                }
                // line 56
                echo "          <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, true, 56), 56, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 56, $this->source), "html", null, true);
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 56), 56, $this->source), "href", "title"), "html", null, true);
                echo " class=\"page-link\">
            <span class=\"visually-hidden\">
              ";
                // line 58
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (t("Current page")) : (t("Page"))));
                echo "
            </span>";
                // line 60
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 60, $this->source), "html", null, true);
                // line 61
                echo "</a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "

      ";
            // line 66
            if ((twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "current", [], "any", false, false, true, 66) && (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 66) || twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 66)))) {
                // line 67
                echo "        <li class=\"page-item disabled\">
          ";
                // line 68
                echo t("<span class=\"page-link\">Page @items.current</span>", array("@items.current" => twig_get_attribute($this->env, $this->source,                 // line 69
($context["items"] ?? null), "current", [], "any", false, false, true, 69), ));
                // line 71
                echo "        </li>
      ";
            }
            // line 73
            echo "
      ";
            // line 75
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["ellipses"] ?? null), "next", [], "any", false, false, true, 75)) {
                // line 76
                echo "        <li class=\"page-item pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 78
            echo "      ";
            // line 79
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 79)) {
                // line 80
                echo "        <li class=\"page-item pager__item pager__item--next\">
          <a href=\"";
                // line 81
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 81), "href", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page"));
                echo "\" rel=\"next\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 81), "attributes", [], "any", false, false, true, 81), 81, $this->source), "href", "title", "rel"), "html", null, true);
                echo " class=\"page-link\">
            <span class=\"visually-hidden\">";
                // line 82
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page"));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 83
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 83), "text", [], "any", true, true, true, 83)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 83), "text", [], "any", false, false, true, 83), 83, $this->source), t("Next ›"))) : (t("Next ›"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 87
            echo "      ";
            // line 88
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 88)) {
                // line 89
                echo "        <li class=\"page-item pager__item pager__item--last\">
          <a href=\"";
                // line 90
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 90), "href", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to last page"));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 90), "attributes", [], "any", false, false, true, 90), 90, $this->source), "href", "title"), "html", null, true);
                echo " class=\"page-link\">
            <span class=\"visually-hidden\">";
                // line 91
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last page"));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 92
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, true, true, 92), "text", [], "any", true, true, true, 92)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, true, true, 92), "text", [], "any", false, false, true, 92), 92, $this->source), t("Last »"))) : (t("Last »"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 96
            echo "    </ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/pagination/pagination.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  268 => 96,  261 => 92,  257 => 91,  249 => 90,  246 => 89,  243 => 88,  241 => 87,  234 => 83,  230 => 82,  222 => 81,  219 => 80,  216 => 79,  214 => 78,  210 => 76,  207 => 75,  204 => 73,  200 => 71,  198 => 69,  197 => 68,  194 => 67,  192 => 66,  188 => 64,  180 => 61,  178 => 60,  174 => 58,  164 => 56,  161 => 55,  158 => 54,  155 => 53,  152 => 52,  150 => 51,  145 => 50,  140 => 49,  138 => 48,  134 => 46,  131 => 45,  129 => 44,  122 => 40,  118 => 39,  110 => 38,  107 => 37,  104 => 36,  102 => 35,  95 => 31,  91 => 30,  83 => 29,  80 => 28,  77 => 27,  71 => 25,  67 => 24,  62 => 23,  60 => 22,  57 => 21,  53 => 19,  49 => 17,  47 => 16,  44 => 15,  42 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/pagination/pagination.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/pagination/pagination.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 14, "set" => 15, "for" => 49, "trans" => 68);
        static $filters = array("escape" => 23, "join" => 23, "t" => 24, "without" => 29, "default" => 31);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'set', 'for', 'trans'],
                ['escape', 'join', 't', 'without', 'default'],
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
