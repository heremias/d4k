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

/* @boom/navbar/navbar-brand.twig */
class __TwigTemplate_0b5f4a7526acb9a27692f197ea922f00157750227af67c57803d0f5c71b593e5 extends \Twig\Template
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
        // line 17
        $macros["navbar_brand"] = $this->macros["navbar_brand"] = $this;
        // line 18
        $context["utility_classes"] = twig_join_filter($this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 18, $this->source), " ");
        // line 19
        echo "
";
        // line 20
        if (($context["path"] ?? null)) {
            // line 21
            echo "  <a href=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["path"] ?? null), 21, $this->source), "html", null, true);
            echo "\" class=\"navbar-brand d-flex align-items-center ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 21, $this->source), "html", null, true);
            echo "\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 21, $this->source), "html", null, true);
            echo "\">
    ";
            // line 22
            if (($context["image"] ?? null)) {
                // line 23
                echo "      ";
                $this->loadTemplate("@boom/logo/logo.twig", "@boom/navbar/navbar-brand.twig", 23)->display($context);
                // line 24
                echo "    ";
            }
            // line 25
            echo "    <div class=\"d-flex flex-column logo-text\">
    ";
            // line 26
            if (($context["text"] ?? null)) {
                // line 27
                echo "      <span class=\"logo-name ml-2\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 27, $this->source), "html", null, true);
                echo "</span>
    ";
            }
            // line 29
            echo "
      ";
            // line 30
            if (($context["slogan"] ?? null)) {
                // line 31
                echo "        <span class=\"logo-slogan ml-2 text-muted small\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["slogan"] ?? null), 31, $this->source), "html", null, true);
                echo "</span>
      ";
            }
            // line 33
            echo "    </div>
  </a>
";
        } else {
            // line 36
            echo "  <span class=\"navbar-brand h1 mb-0 ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 36, $this->source), "html", null, true);
            echo "\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 36, $this->source), "html", null, true);
            echo "\">
    ";
            // line 37
            if (($context["image"] ?? null)) {
                // line 38
                echo "      ";
                $this->loadTemplate("@boom/logo/logo.twig", "@boom/navbar/navbar-brand.twig", 38)->display($context);
                // line 39
                echo "    ";
            }
            // line 40
            echo "    <span class=\"logo-text ml-2\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["text"] ?? null), 40, $this->source), "html", null, true);
            echo "</span>
  </span>
";
        }
        // line 43
        echo "
";
    }

    // line 44
    public function macro_image($__src__ = null, $__width__ = null, $__height__ = null, $__alt__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "src" => $__src__,
            "width" => $__width__,
            "height" => $__height__,
            "alt" => $__alt__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 45
            echo "  <img src=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["src"] ?? null), 45, $this->source), "html", null, true);
            echo "\" width=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["width"] ?? null), 45, $this->source), 30)) : (30)), "html", null, true);
            echo "\" height=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("height", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["height"] ?? null), 45, $this->source), "auto")) : ("auto")), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("alt", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["alt"] ?? null), 45, $this->source), "")) : ("")), "html", null, true);
            echo "\" class=\"mr-2\" />
";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@boom/navbar/navbar-brand.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 45,  119 => 44,  114 => 43,  107 => 40,  104 => 39,  101 => 38,  99 => 37,  92 => 36,  87 => 33,  81 => 31,  79 => 30,  76 => 29,  70 => 27,  68 => 26,  65 => 25,  62 => 24,  59 => 23,  57 => 22,  48 => 21,  46 => 20,  43 => 19,  41 => 18,  39 => 17,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/navbar/navbar-brand.twig", "/var/www/html/web/themes/custom/boom/src/components/navbar/navbar-brand.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 17, "set" => 18, "if" => 20, "include" => 23, "macro" => 44);
        static $filters = array("join" => 18, "escape" => 21, "default" => 45);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['import', 'set', 'if', 'include', 'macro'],
                ['join', 'escape', 'default'],
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
