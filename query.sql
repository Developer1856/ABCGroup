SELECT * FROM public.click
                  INNER JOIN public.actions ON public.click.id=public.actions.click_id;


SELECT * FROM public.click
                  LEFT JOIN public.actions ON public.click.id=public.actions.click_id
                  WHERE public.actions.id IS NULL;