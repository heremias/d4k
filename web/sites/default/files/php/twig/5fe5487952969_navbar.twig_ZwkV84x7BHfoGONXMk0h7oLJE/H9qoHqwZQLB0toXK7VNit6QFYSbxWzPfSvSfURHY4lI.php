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

/* @bootstrap_storybook/navbar/navbar.twig */
class __TwigTemplate_2cbd59f8fc4f5ffbf30f1dc87f2d6db071b6af2f154a210755481600c5e94d69 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'branding' => [$this, 'block_branding'],
            'left' => [$this, 'block_left'],
            'right' => [$this, 'block_right'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        $context["container"] = (((($context["container"] ?? null) == "fixed")) ? ("container") : (false));
        // line 19
        $context["placement"] = (($context["placement"]) ?? (""));
        // line 20
        $context["color"] = (($context["color"]) ?? ("light"));
        // line 21
        echo "
<nav class=\"navbar navbar-expand-xl justify-content-between navbar-";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["color"] ?? null), 22, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placement"] ?? null), 22, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_join_filter($this->sandbox->ensureToStringAllowed(($context["utility_classes"] ?? null), 22, $this->source), " "), "html", null, true);
        echo "\">
  ";
        // line 23
        if (($context["container"] ?? null)) {
            // line 24
            echo "    <div class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 24, $this->source), "html", null, true);
            echo "\">
  ";
        }
        // line 26
        echo "
  ";
        // line 27
        $this->displayBlock('branding', $context, $blocks);
        // line 30
        echo "
  <button type=\"button\" class=\"navbar-toggle navbar-toggle--inactive\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
    <span class=\"sr-only\">";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle navigation"));
        echo "</span>
    <span class=\"icon-bar\"></span>
    <span class=\"icon-bar\"></span>
    <span class=\"icon-bar icon-bar--last\"></span>
  </button>

  <div class=\"collapse navbar-collapse\">
    ";
        // line 39
        $this->displayBlock('left', $context, $blocks);
        // line 42
        echo "
    ";
        // line 43
        $this->displayBlock('right', $context, $blocks);
        // line 46
        echo "  </div>

  ";
        // line 48
        if (($context["container"] ?? null)) {
            // line 49
            echo "    </div>
  ";
        }
        // line 51
        echo "</nav>

";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("bootstrap_storybook/navbar"), "html", null, true);
        echo "
";
    }

    // line 27
    public function block_branding($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 28
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["branding"] ?? null), 28, $this->source), "html", null, true);
        echo "
  ";
    }

    // line 39
    public function block_left($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["left"] ?? null), 40, $this->source), "html", null, true);
        echo "
    ";
    }

    // line 43
    public function block_right($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 44
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["right"] ?? null), 44, $this->source), "html", null, true);
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "@bootstrap_storybook/navbar/navbar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 44,  135 => 43,  128 => 40,  124 => 39,  117 => 28,  113 => 27,  107 => 53,  103 => 51,  99 => 49,  97 => 48,  93 => 46,  91 => 43,  88 => 42,  86 => 39,  76 => 32,  72 => 30,  70 => 27,  67 => 26,  61 => 24,  59 => 23,  51 => 22,  48 => 21,  46 => 20,  44 => 19,  42 => 18,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_storybook/navbar/navbar.twig", "/var/www/html/web/themes/contrib/bootstrap_storybook/src/components/navbar/navbar.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 18, "if" => 23, "block" => 27);
        static $filters = array("escape" => 22, "join" => 22, "t" => 32);
        static $functions = array("attach_library" => 53);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['escape', 'join', 't'],
                ['attach_library']
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
