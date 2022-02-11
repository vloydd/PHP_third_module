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

/* modules/custom/vloyd/templates/book.html.twig */
class __TwigTemplate_79b103620ba31a4498d0b0533a3d45999cdc9cd51f52ceb94ec1c87c3a9ba735 extends \Twig\Template
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
        echo "<div class=\"book_table\">
  <div class=\"book_table-basic\">
    <div class=\"book_table-publishedByOn book_table-author\">
      <p class=\"book_table-publishedByOn-title\">Published by: </p>
      <ul class=\"book_table-publishedByOn-list\">
        <li>
          <div class=\"book_name_created_wrapper\">
            <div class=\"book_item book_name\">
              ";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "name", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
        echo "
            </div>
            <p class=\"book_prefixes book_label\"> at </p>
            <div class=\"book_created\">
              ";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "created", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
        echo "
            </div>
          </div>
        </li>
        <li>
          <div class=\"book_email_wrapper\">
            <p class=\"book_email book_label\">Email: </p>
            <p class=\"book_email_item book_item\">
              ";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "email", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
        echo "
            </p>
          </div>
        </li>
        <li>
          <div class=\"book_phone_wrapper\">
            <p class=\"book_phone book_label\">Phone Number: </p>
            <p class=\"book_phone_item book_item\">
            ";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "phone", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
        echo "
            </p>
          </div>
        </li>
      </ul>
    </div>
    <div class=\"book_item book_avatar\">
      ";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "avatar", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
        echo "
    </div>
  </div>
  <div class=\"book_table-main\">
    <div class=\"book_review-wrapper book_item\">
      <p class=\"book_review book_review-item book_item\">";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "review", [], "any", false, false, true, 41), 41, $this->source), "html", null, true);
        echo "</p>
    </div>
    ";
        // line 43
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 43)) {
            // line 44
            echo "      <div class=\"book_item book_image\">
        ";
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "image", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
            echo "
     </div>
    ";
        }
        // line 48
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "administer nodes"], "method", false, false, true, 48)) {
            // line 49
            echo "      <div class=\"book_administer_buttons\">
        ";
            // line 50
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["button"] ?? null), 50, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 53
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/vloyd/templates/book.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 53,  118 => 50,  115 => 49,  112 => 48,  106 => 45,  103 => 44,  101 => 43,  96 => 41,  88 => 36,  78 => 29,  67 => 21,  56 => 13,  49 => 9,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/vloyd/templates/book.html.twig", "/var/www/web/modules/custom/vloyd/templates/book.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 43);
        static $filters = array("escape" => 9);
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
