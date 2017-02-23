using UnityEngine;
using System.Collections;

public class PopUpStoreWindow : MonoBehaviour
{

    public static PopUpStoreWindow instance;

    public float speedOfScrollingButtons;

    private RectTransform rectTransform;

    public GameObject options_off;
    public GameObject options_on;
    public bool show;
    


    private void Awake()
    {

        instance = this;
        rectTransform = GetComponent<RectTransform>();

    }

    void Update()
    {
        if (show)
        {
            ShowPopUpWindow();
        }
        else if (!show && rectTransform.offsetMin.y <= (220 + Screen.height / 2.4))
        {
            
            HidePopUpWindow();
        }
    }
    public void ShowPopUpWindow()
    {
        if (rectTransform.offsetMin.y != 0)
        {
            
            
            rectTransform.anchorMin = new Vector2(0.3f, 0.3f);
            rectTransform.anchorMax = new Vector2(0.7f, 0.7f);
            speedOfScrollingButtons = -8f;
            rectTransform.offsetMin += new Vector2(rectTransform.offsetMin.x, speedOfScrollingButtons);
            rectTransform.offsetMax += new Vector2(rectTransform.offsetMax.x, speedOfScrollingButtons);
            options_off.SetActive(true);
            options_on.SetActive(false);
        }

    }
    public void HidePopUpWindow()
    {
        
        if (rectTransform.offsetMin.y <= (220 + Screen.height / 2.4))
        {
            speedOfScrollingButtons = -8f;
            rectTransform.offsetMin -= new Vector2(rectTransform.offsetMin.x, speedOfScrollingButtons);
            rectTransform.offsetMax -= new Vector2(rectTransform.offsetMax.x, speedOfScrollingButtons);
            options_off.SetActive(false);
            options_on.SetActive(true);
        }
    }
   


}
